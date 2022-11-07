const daySelect = document.getElementById("dia");
const monthSelect = document.getElementById("mes");
const yearSelect = document.getElementById("ano");

const months = {
  "Janeiro" : 1,
  "Fevereiro" : 2,
  "Março" : 3,
  "Abril" : 4,
  "Maio" : 5,
  "Junho" : 6,
  "Julho" : 7,
  "Agosto" : 8,
  "Setembro" : 9,
  "Outubro" : 10,
  "Novembro" : 11,
  "Dezembro" : 12,
};

(function populateMonths() {
  for (let i = 0; i < months.length; i++) {
    const option = document.createElement("option");
    option.textContent = months[i];
    monthSelect.appendChild(option);
  }
  monthSelect.value = "Janeiro";
})();

let previousDay;

function populateDays(month) {
  while (daySelect.firstChild) {
    daySelect.removeChild(daySelect.firstChild);
  }
  let dayNum;
  year = yearSelect.value;

  if (
    month === "Janeiro" ||
    month === "Março" ||
    month === "Maio" ||
    month === "Julho" ||
    month === "Agosto" ||
    month === "Outubro" ||
    month === "Dezembro"
  ) {
    dayNum = 31;
  } else if (
    month === "Abril" ||
    month === "Junho" ||
    month === "Setembro" ||
    month === "Novembro"
  ) {
    dayNum = 30;
  } else {
    if (new Date(year, 1, 29).getMonth() === 1) {
      dayNum = 29;
    } else dayNum = 28;
  }
  for (let i = 1; i <= dayNum; i++) {
    const option = document.createElement("option");
    option.textContent = i;
    daySelect.appendChild(option);
  }
  if (previousDay) {
    daySelect.value = previousDay;
    if(daySelect.value === ""){
        daySelect.value = previousDay - 1;
    }
    if(daySelect.value === ""){
        daySelect.value = previousDay - 2;
    }
    if(daySelect.value === ""){
        daySelect.value = previousDay - 3;
    }
  }
}

function populateYears() {
  let year = new Date().getFullYear();
  for (let i = 0; i < 101; i++) {
    const option = document.createElement("option");
    option.textContent = year - i;
    yearSelect.appendChild(option);
  }
}

populateDays(monthSelect.value);
populateYears();

yearSelect.onchange = function () {
  populateDays(monthSelect.value);
};

monthSelect.onchange = function () {
  populateDays(monthSelect.value);
};

daySelect.onchange = function () {
  previousDay = daySelect.value;
};