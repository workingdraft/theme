const path = require('path')
const webpack = require('webpack')

const PORT = process.env.PORT || 3000

module.exports = {
  entry: {
    index: [
      'babel-polyfill',
      path.resolve(__dirname, 'app/index.js'),
    ],
  },
  devtool: 'inline-sourcemap',
  cache: true,
  mode: 'development',
  output: {
    path: path.resolve(__dirname, 'dist/'),
    filename: '[name].js',
  },
  module: {
    rules: [{
      test: /\.js$/,
      exclude: /(node_modules)/,
      use: {
        loader: 'babel-loader',
        options: {
          presets: ['@babel/preset-env'],
        },
      }
    }]
  },
}
