const personalBtn = document.getElementById("personalBtn");
const teamsBtn = document.getElementById("teamsBtn");
const joinedBtn = document.getElementById("joinedBtn");

const teamsTable = document.getElementById("teamsTable");
const personalTable = document.getElementById("employeesTable");
const joinedTable = document.getElementById("joinedTable");

personalBtn.addEventListener("click", () => {
    teamsTable.classList.add("hidden");
    personalTable.classList.remove("hidden");
    joinedTable.classList.add("hidden");
});

teamsBtn.addEventListener("click", () => {
    teamsTable.classList.remove("hidden");
    personalTable.classList.add("hidden");
    joinedTable.classList.add("hidden");
});

joinedBtn.addEventListener("click", () => {
    teamsTable.classList.add("hidden");
    personalTable.classList.add("hidden");
    joinedTable.classList.remove("hidden");
});