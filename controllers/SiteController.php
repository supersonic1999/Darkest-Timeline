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
use app\models\Timeline;

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

        $total_votes = $this->totalPerTimelineEvent;

        $data = [];
        foreach ($objects as $key => $item) {
            $json = $item->JSONData;
            $json['votes'] = $item->voteCount;
            $json['votedFor'] = false;
            $json['votes_monthly'] = $item->voteMonthlyCount;
            if (isset($total_votes[0]) && $total_votes[0]['id'] == $item->id) {
                $json['position'] = 1;
            } else if (isset($total_votes[1]) && $total_votes[1]['id'] == $item->id) {
                $json['position'] = 2;
            } else if (isset($total_votes[2]) && $total_votes[2]['id'] == $item->id) {
                $json['position'] = 3;
            } else {
                $json['position'] = '';
            }

            $data[] = $json;
        }

        return $this->render('index', [
            'timelineData' => $data,
            'contactModel' => $model,
            'canVote' => $this->votedAmount < 5,
        ]);
    }

    public function actionAjaxCastVote($timeline_id)
    {
        if (!Yii::$app->request->validateCsrfToken()) {
            throw new \yii\web\HttpException(404, 'Invalid CSRF');
        }

        $sessionid = Yii::$app->session->getId();
        if ($this->votedAmount >= 5) {
            throw new \yii\web\HttpException(404, 'Max votes reached!');
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
                'canVote' => $this->votedAmount < 5,
            ],
        ]);
    }

    public function getVotedAmount()
    {
        $sessionid = Yii::$app->session->getId();

        return Votes::find()->andWhere(['session_id' => $sessionid])
            ->andWhere(['>', 'voted_at', strtotime(date("Y-m-01", time()))])->count();
    }

    public function getTotalPerTimelineEvent() {
        $data = (new \yii\db\Query())
            ->select('timeline.*, COUNT(votes.id) AS total_votes')
            ->from('timeline')
            ->leftJoin('votes', 'votes.timeline_id = timeline.id')
            ->groupBy('timeline.id')
            ->orderBy(['total_votes' => SORT_DESC])
            ->andWhere(['>', 'votes.voted_at', strtotime(date("Y-m-01", time()))])
            ->all();

        return $data;
    }
}
