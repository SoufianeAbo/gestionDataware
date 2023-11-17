const personalBtn = document.getElementById("personalBtn");
const teamsBtn = document.getElementById("teamsBtn");
const joinedBtn = document.getElementById("joinedBtn");

const teamsTable = document.getElementById("teamsTable");
const personalTable = document.getElementById("employeesTable");
const joinedTable = document.getElementById("joinedTable");

const idInput = document.getElementById("idInput");
const modifyForm = document.getElementById("formInput");

const maxTeam = 9;

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

function validateRegex(team, phone, firstName, lastNameA, email, status) {
    const teamID = document.getElementById(team).value;

    const phoneNum = document.getElementById(phone).value;
    const phoneRegex = /\+212(\s+([0-9]+\s+)+)[0-9]+/i;

    const name = document.getElementById(firstName).value;
    const lastName = document.getElementById(lastNameA).value;
    const nameRegex = /[A-Za-z]+/i;

    const emailID = document.getElementById(email).value;
    const emailRegex = /[A-Za-z0-9]+@[A-Za-z]+\.[A-Za-z]+/i;

    const statusID = document.getElementById(status).value;

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

    if (!emailRegex.test(emailID)) {
        alert("Invalid e-mail!");
        return false;
    }

    if (statusID !== "Active" && statusID !== "Congé") {
        alert("Invalid status!");
        return false;
    }

    return true;
}

function validateID() {
    // const team = document.getElementById("teamid").value;

    // if (team > maxTeam || team <= 0) {
    //     alert("Invalid team ID! This team ID doesn't exist!");
    //     return false;
    // } else {

    // }

    if (!validateRegex("team", "phone", "firstName", "lastName", "email", "status")) {
        return false;
    }
    return true;
}

modifyForm.addEventListener("submit", function(event) {
    event.preventDefault();
});