//入力フォームの年齢欄を生年月日から自動入力する動作
var formObj = document.querySelector('#mw_wp_form_mw-wp-form-31 form')
var formObjYear = document.querySelector("select[name='year']")
var formObjMonth = document.querySelector("select[name='month']")
var formObjDay = document.querySelector("select[name='day']")
/**
 * 数値のゼロ埋め（桁を揃える）
 * @param {number|string} number 対象の数字
 * @param {number} digit 桁数
 * @return {string} ゼロが埋められた数字を返す
**/
var zeroPadding = function (number, digit) {
  var numberLength = String(number).length
  if (digit > numberLength) {
    return new Array(digit - numberLength + 1).join(0) + number
  } else {
    return number
  }
}
/**
 * 日付から年齢に計算
 * @param {number|string} year 年
 * @param {number|string} month 月
 * @param {number|string} day 日
 * @return {number} 年齢を返す
**/
var ageCalculator = function (year, month, day) {
  var dateObj = new Date()
  var today = parseInt(
    '' + dateObj.getFullYear() + zeroPadding(dateObj.getMonth() + 1, 2) + zeroPadding(dateObj.getDate(), 2)
  )
  var birthday = parseInt('' + year + zeroPadding(month, 2) + zeroPadding(day, 2))
  return parseInt((today - birthday) / 10000)
}
/**
 * 日付から年齢に変換し反映
 * @param {'age'|'date'} mode 年齢だけ反映するかプルダウンの選択肢も年月に合わせたものに反映するか
**/
var changeDate = function (mode) {
  var tYear = formObjYear
  var tMonth = formObjMonth
  var tDays = formObjDay
  var selectY = tYear.options[tYear.selectedIndex].value
  var selectM = tMonth.options[tMonth.selectedIndex].value
  var selectD = tDays.options[tDays.selectedIndex].value
  if (mode === 'date') {
    var dateObj = new Date(selectY, selectM, 0)
    tDays.length = 0
    for (var i = 1, len = dateObj.getDate(); i <= len; i++) {
      tDays.options[i] = new Option(i, i)
    }
    tDays.removeChild(tDays.options[0])
    tDays.options[selectD > tDays.length ? tDays.length - 1 : selectD - 1].selected = true
  }
  formObj.age.value = ageCalculator(selectY, selectM, selectD)
}
// 年の選択変更時
formObjYear.addEventListener(
  'change',
  function () {
    changeDate('age')
  },
  false
)
// 月の選択変更時
formObjMonth.addEventListener(
  'change',
  function () {
    changeDate('age')
  },
  false
)
// 日の選択変更時
formObjDay.addEventListener(
  'change',
  function () {
    changeDate('age')
  },
  false
)
