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
    'Январь',
    'Февраль',
    'Март',
    'Апрель',
    'Май',
    'Июнь',
    'Июль',
    'Август',
    'Сентябрь',
    'Октябрь',
    'Ноябрь',
    'Декабрь',
];
let month_picker = document.querySelector('#month-picker');
const dayTextformat = document.querySelector('.day-text-format');

month_picker.onclick = () => {
    month_list.classList.remove('hideonce');
    month_list.classList.remove('hide');
    month_list.classList.add('show');
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
    const marker = document.querySelectorAll('.marker');
    const mark_day = document.querySelectorAll('.square-time');
    

    for (let i = 1; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
      let day = document.createElement('a');
      if (i >= first_day.getDay()) {
        day.innerHTML = i - first_day.getDay() + 1;
        day.href = "index.php?day=" + (i - first_day.getDay() + 1) + "&month=" + (month + 1) + "&year=" + year;
        
        for (var j = 0; j < mark_day.length; j++) { //добавление маркеров на календарь
            let date = mark_day[j].id;

            if (date.substring(0,4).localeCompare(year) === 0 && date.substring(5,7).localeCompare(month + 1) === 0 && date.substring(9,10).localeCompare(i - first_day.getDay() + 1 + 1) === 0) {
                let mark = document.createElement('div');
                mark.classList.add('mark');
                mark.classList.add(marker[j].classList[1]);
                day.appendChild(mark);
            }
        }

        //добавление текущего дня
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
    'ru-ru',
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
    const formatTimer = new Intl.DateTimeFormat('ru-ru', option).format(timer);
    let time = `${`${timer.getHours()}`.padStart(
        2,
        '0'
    )}:${`${timer.getMinutes()}`.padStart(
        2,
        '0'
    )}: ${`${timer.getSeconds()}`.padStart(2, '0')}`;
    todayShowTime.textContent = formatTimer;
}, 1000); 