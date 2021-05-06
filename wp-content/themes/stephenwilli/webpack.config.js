const pkg = require('./package.json');
const path = require('path');
const sass = require('sass');
const webpack = require("webpack");
const beep = require('webpack-build-notifier');
const webfontsGenerator = require('webfonts-generator');
const execSync = require('child_process').execSync;
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = (env, options) => {
  
  webfontsGenerator({
  files: [
    'assets/icons/angle-left.svg',
    'assets/icons/angle-right.svg',
    'assets/icons/dot.svg',
    'assets/icons/phone.svg',
    'assets/icons/facebook.svg',
    'assets/icons/instagram.svg',
    'assets/icons/mail.svg',
    'assets/icons/pin.svg',
    'assets/icons/twitter.svg',
    'assets/icons/arrow-left.svg',
    'assets/icons/plus.svg',
    'assets/icons/minus.svg',
    'assets/icons/sw.svg',
    'assets/icons/tumblr.svg',
    'assets/icons/arrow-right.svg',
    'assets/icons/email.svg'
  ],
  dest: './assets/fonts/',
  fontName: 'tmbr-icons',
  templateOptions: {
    baseClass: 'icon',
    classPrefix: 'icon-'
  }, 
  types: ['woff2', 'woff', 'svg']
}, function(error) {
  if (error) {
    console.log('Fail!', error);
  } else {
    console.log('Icon Font Built');
  }
}) 

  const build = options.mode === 'production';

  return {
    entry: {
      main: [
        './assets/src/index.js',
        './assets/scss/index.scss'
      ]
    },
    output: {
      path: path.resolve(__dirname, './build'),
      filename: build ? '[name].[hash].js' : '[name].js',
      hashDigestLength: 8
    },
    devtool: build ? false : 'source-map',
    module: {
      rules: [{
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: [
              '@babel/preset-env',
              '@wordpress/default'
            ]
          }
        },
      }, {
        test: /\.(css|scss)$/,
        use: [{
          loader: MiniCssExtractPlugin.loader,
        },{
          loader: 'css-loader',
          options: {
            sourceMap: true
          }
        }, {
          loader: 'sass-loader',
          options: {
            implementation: sass,
            sourceMap: true
          }
        }]
      }, {
        test: /\.(png|jpg|jpeg|gif|svg|woff|woff2|json|mp3|mp4|ico)$/,
        use: {
          loader: 'file-loader',
          options: {
            name: '../[path][name].[ext]?[hash]',
            emitFile: false
          }
        }
      }]
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: build ? '[name].[hash].css' : '[name].css'
      }),
      new ManifestPlugin({
        filter: ({name}) => {
          return name.endsWith('.css') || name.endsWith('.js')
        },
        serialize: manifest => {
          manifest.date = new Date().toISOString().slice(0, 10).replace(/-/g, '');
          try {
            manifest.hash = execSync('git rev-parse HEAD', {encoding: 'utf8'}).split('\n').join('').slice(0, 8);
          } catch (e) {
            manifest.hash = Math.random();
          }
          return JSON.stringify(manifest, null, 2);
        }
      }),
      new webpack.ProvidePlugin({
        $: "jquery",
        jQuery: "jquery"
      }),
      new BrowserSyncPlugin({
        proxy: `${pkg.name}.localhost`,
        host: 'localhost',
        port: 5000,
        open: false,
        notify: false,
        files: [
          path.join(__dirname, '**/*.php'),
          path.join(__dirname, 'build/*')
        ]
      }),
      new beep({
        title: "My Project Webpack Build",
        logo: path.resolve("./img/favicon.png"),
        suppressSuccess: true
      })
    ],
    optimization: {
      minimizer: [
        new OptimizeCSSAssetsPlugin(),
        new TerserPlugin({terserOptions: {output: {comments: false}}})
      ]
    }
  };
};