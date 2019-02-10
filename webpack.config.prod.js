const path = require('path')

module.exports = {
  entry: {
    index: [
      path.resolve(__dirname, 'app/index.js'),
    ],
  },
  devtool: false,
  mode: 'production',
  cache: false,
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
