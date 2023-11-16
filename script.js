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

function validateRegex() {
    const teamID = document.getElementById("team").value;

    const maxTeam = 9;

    const phoneNum = document.getElementById("phone").value;
    const phoneRegex = /\+212(\s+([0-9]+\s+)+)[0-9]+/i;

    const name = document.getElementById("name").value;
    const lastName = document.getElementById("lastName").value;
    const nameRegex = /[A-Za-z]+/i;

    const email = document.getElementById("email").value;
    const emailRegex = /[A-Za-z0-9]+@[A-Za-z]+\.[A-Za-z]+/i;

    const status = document.getElementById("status").value;

    if (!phoneRegex.test(phoneNum)) {
        alert("Invalid phone number!");
        return false;
    }

    if (teamID > maxTeam || teamID <= 0) {
        alert("Invalid team ID! This team ID doesn't exist");
        return false;
    }

    if (!nameRegex.test(name)) {
        alert("Invalid first name!");
        return false;
    }

    if (!nameRegex.test(lastName)) {
        alert("Invalid last name!");
        return false;
    }

    if (!emailRegex.test(email)) {
        alert("Invalid e-mail!");
        return false;
    }

    if (status !== "Active" && status !== "Congé") {
        alert("Invalid status!");
        return false;
    }

    return true;
}