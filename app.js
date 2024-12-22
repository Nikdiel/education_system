// Получаем данные из localStorage или создаем новые
let students = JSON.parse(localStorage.getItem('students')) || [];
let schedules = JSON.parse(localStorage.getItem('schedules')) || [];
let grades = JSON.parse(localStorage.getItem('grades')) || [];

// Функция отображения студентов
function displayStudents() {
    const studentList = document.getElementById('scheduleList');
    studentList.innerHTML = '';
    
    students.forEach(function(student, index) {
        const li = document.createElement('li');
        li.textContent = `${student.name} (DOB: ${student.dob})`;
        studentList.appendChild(li);
    });
}

// Функция добавления студента
document.getElementById('studentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('studentName').value;
    const dob = document.getElementById('studentDob').value;

    const student = { name, dob };
    students.push(student);
    localStorage.setItem('students', JSON.stringify(students));

    displayStudents();
    document.getElementById('studentForm').reset();
});

// Функция добавления расписания
document.getElementById('addScheduleForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const courseName = document.getElementById('courseName').value;
    const dayOfWeek = document.getElementById('dayOfWeek').value;
    const startTime = document.getElementById('startTime').value;
    const endTime = document.getElementById('endTime').value;

    const schedule = { courseName, dayOfWeek, startTime, endTime };
    schedules.push(schedule);
    localStorage.setItem('schedules', JSON.stringify(schedules));

    displaySchedules();
    document.getElementById('addScheduleForm').reset();
});

// Функция отображения расписания
function displaySchedules() {
    const scheduleList = document.getElementById('scheduleList');
    scheduleList.innerHTML = '';
    
    schedules.forEach(function(schedule) {
        const li = document.createElement('li');
        li.textContent = `${schedule.courseName} on ${schedule.dayOfWeek} from ${schedule.startTime} to ${schedule.endTime}`;
        scheduleList.appendChild(li);
    });
}

// Функция добавления оценки
document.getElementById('addGradeForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const gradeCourseName = document.getElementById('gradeCourseName').value;
    const studentGrade = document.getElementById('studentGrade').value;

    const grade = { gradeCourseName, studentGrade };
    grades.push(grade);
    localStorage.setItem('grades', JSON.stringify(grades));

    displayGrades();
    document.getElementById('addGradeForm').reset();
});

// Функция отображения оценок
function displayGrades() {
    const gradeList = document.getElementById('gradeList');
    gradeList.innerHTML = '';
    
    grades.forEach(function(grade) {
        const li = document.createElement('li');
        li.textContent = `${grade.gradeCourseName}: ${grade.studentGrade}`;
        gradeList.appendChild(li);
    });
}

// Инициализация отображения данных
displayStudents();
displaySchedules();
displayGrades();
    