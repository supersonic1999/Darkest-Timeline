let mix = require('laravel-mix');

if(!mix.inProduction()) {
  mix.webpackConfig({
    devtool: 'source-map',
    externals: {
      jquery: 'jQuery',
    }
  });
  mix.sourceMaps();
} else {
  mix.webpackConfig({
    externals: {
      jquery: 'jQuery',
    }
  });
}

// backend
mix.setPublicPath('web');
mix.js('source/main.js', 'js/app.js').vue();
mix.sass('source/main.scss', 'css/app.css');
mix.version();