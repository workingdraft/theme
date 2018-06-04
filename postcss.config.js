module.exports = {
  map: false,
  plugins: [
    require("postcss-import")(),
    require("cssnano")(),
  ]
}
