const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const globImporter = require('node-sass-glob-importer')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const { resolve } = require('path')
const WebpackAssetsManifestPlugin = require('webpack-assets-manifest')

module.exports = (env, argv) => {
  const isDev = argv.mode === 'development'
  const options = { sourceMap: isDev }

  const devPlugins = [
    new BrowserSyncPlugin({
      // Set your desired proxy when calling webpack
      // npm start -- --env.proxy example.com
      proxy: env && env.proxy,
      open: false
    })
  ]
  const prodPlugins = [
    new WebpackAssetsManifestPlugin(),
    new OptimizeCssAssetsPlugin()
  ]
  const plugins = [
    new MiniCssExtractPlugin({
      filename: isDev ? '[name].css' : '[name].[chunkhash].css'
    })
  ].concat(isDev ? devPlugins : prodPlugins)

  return {
    entry: { theme: './js/index.js' },
    output: {
      path: resolve(__dirname, 'dist'),
      filename: isDev ? '[name].js' : '[name].[chunkhash].js'
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader'
          }
        },
        {
          test: /\.s?css$/,
          use: [
            { loader: MiniCssExtractPlugin.loader, options },
            { loader: 'css-loader', options },
            { loader: 'postcss-loader', options },
            {
              loader: 'sass-loader',
              options: {
                ...options,
                sassOptions: { importer: globImporter() }
              }
            }
          ]
        },
        {
          test: /\.(jpe?g|png|gif|eot|svg|ttf|woff|woff2|mp4|webm)$/,
          loader: 'file-loader'
        }
      ]
    },
    plugins,
    stats: {
      children: false,
      chunks: false,
      colors: true,
      hash: false,
      modules: false,
      version: false
    },
    devtool: isDev ? 'source-map' : false
  }
}
