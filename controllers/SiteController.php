<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Votes;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        $objects = \app\models\Timeline::find()->orderBy('date')->all();

        $data = [];
        foreach ($objects as $key => $item) {
            $json = $item->JSONData;
            $json['winning'] = $key == 3 ? true : false;
            $json['votes'] = $item->voteCount;

            $data[] = $json;
        }

        return $this->render('index', [
            'timelineData' => $data,
            'contactModel' => $model,
            'voted' => $this->checkVoted,
        ]);
    }

    public function actionAjaxCastVote($timeline_id)
    {
        if (!Yii::$app->request->validateCsrfToken()) {
            throw new \yii\web\HttpException(404, 'Invalid CSRF');
        }

        $sessionid = Yii::$app->session->getId();
        if (Votes::findOne(['session_id' => $sessionid])) {
            throw new \yii\web\HttpException(404, 'You have already voted!');
        }

        $vote = new Votes;
        $vote->timeline_id = $timeline_id;
        $vote->session_id = $sessionid;
        $vote->voted_at = strval(time());
        $vote->save();

        return \Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => [
                'status' => 'success',
                'code' => 200,
            ],
        ]);
    }

    public function getCheckVoted()
    {
        $sessionid = Yii::$app->session->getId();
        if (!$sessionid) return false;

        return Votes::findOne(['session_id' => $sessionid]) != null;
    }
}
