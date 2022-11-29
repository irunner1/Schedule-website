const isLeapYear = (year) => {
    return (
        (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
        (year % 100 === 0 && year % 400 === 0)
    );
};
const getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28;
};
let calendar = document.querySelector('.calendar');
const month_names = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
];
let month_picker = document.querySelector('#month-picker');
const dayTextformat = document.querySelector('.day-text-format');
const timeformat = document.querySelector('.time-format');
const dateformat = document.querySelector('.date-format');

month_picker.onclick = () => {
    month_list.classList.remove('hideonce');
    month_list.classList.remove('hide');
    month_list.classList.add('show');
    dayTextformat.classList.remove('showtime');
    dayTextformat.classList.add('hidetime');
    timeformat.classList.remove('showtime');
    timeformat.classList.add('hideTime');
    dateformat.classList.remove('showtime');
    dateformat.classList.add('hideTime');
};
  
const generateCalendar = (month, year) => {
    let calendar_days = document.querySelector('.calendar-days');
    calendar_days.innerHTML = '';
    let calendar_header_year = document.querySelector('#year');
    let days_of_month = [
        31,
        getFebDays(year),
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
    ];

    let currentDate = new Date();
    month_picker.innerHTML = month_names[month];
    calendar_header_year.innerHTML = year;
    let first_day = new Date(year, month);

    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
      let day = document.createElement('div');
    //   day.classList.add("day");
      if (i >= first_day.getDay()) {
        day.innerHTML = i - first_day.getDay() + 1;
        if (i - first_day.getDay() + 1 === currentDate.getDate() && year === currentDate.getFullYear() && month === currentDate.getMonth()) {
            day.classList.add('current-date');
        }
      }
      calendar_days.appendChild(day);
    }
};
  
let month_list = calendar.querySelector('.month-list');
month_names.forEach((e, index) => {
    let month = document.createElement('div');
    month.innerHTML = `<div>${e}</div>`;
  
    month_list.append(month);
    month.onclick = () => {
        currentMonth.value = index;
        generateCalendar(currentMonth.value, currentYear.value);
        month_list.classList.replace('show', 'hide');
        dayTextformat.classList.remove('hideTime');
        dayTextformat.classList.add('showtime');
        timeformat.classList.remove('hideTime');
        timeformat.classList.add('showtime');
        dateformat.classList.remove('hideTime');
        dateformat.classList.add('showtime');
    };
});
  
(function () {
    month_list.classList.add('hideonce');
})();
document.querySelector('#pre-year').onclick = () => {
    --currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};
document.querySelector('#next-year').onclick = () => {
    ++currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};
  
let currentDate = new Date();
let currentMonth = { value: currentDate.getMonth() };
let currentYear = { value: currentDate.getFullYear() };
generateCalendar(currentMonth.value, currentYear.value);

const todayShowTime = document.querySelector('.time-format');
const todayShowDate = document.querySelector('.date-format');

const currshowDate = new Date();
const showCurrentDateOption = {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    weekday: 'long',
};
const currentDateformat = new Intl.DateTimeFormat(
    'en-US',
    showCurrentDateOption
).format(currshowDate);
todayShowDate.textContent = currentDateformat;
setInterval(() => {
    const timer = new Date();
    const option = {
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric',
    };
    const formatTimer = new Intl.DateTimeFormat('en-us', option).format(timer);
    let time = `${`${timer.getHours()}`.padStart(
        2,
        '0'
    )}:${`${timer.getMinutes()}`.padStart(
        2,
        '0'
    )}: ${`${timer.getSeconds()}`.padStart(2, '0')}`;
    todayShowTime.textContent = formatTimer;
  }, 1000);
  