// function login(){
//     const usernameInput = document.getElementById("username");
// const passwordInput = document.getElementById("password");
// const messageDiv = document.getElementById("message");

// // Get the input values
// const username = usernameInput.value;
// const password = passwordInput.value;

// // Check if the input matches the expected values
// if (username === "admin" && password === "123") {
//     // If the credentials are correct, display the welcome message
//     messageDiv.textContent = "Welcome";
// } else {
//     // If the credentials are incorrect, display the not registered message
//     messageDiv.innerText = "Not registered";
// }
// }



//NOTE - part-2
const newTaskInput = document.getElementById("new-task");
const addBtn = document.getElementById("add-btn");
const tasksList = document.getElementById("tasks-list");

addBtn.addEventListener("click", function () {
    const taskName = newTaskInput.value.trim();
    if (taskName !== "") {
        addNewTask(taskName);
        newTaskInput.value = "";
    }
});

function addNewTask(taskName) {
    const li = document.createElement("li");
    li.textContent = taskName;

    const doneBtn = document.createElement("button");
    doneBtn.textContent = "Done";
    doneBtn.classList.add("done-btn");
    doneBtn.addEventListener("click", function () {
        li.classList.toggle("done");
    });

    const deleteBtn = document.createElement("button");
    deleteBtn.textContent = "Delete";
    deleteBtn.addEventListener("click", function () {
        li.remove();
    });

    li.appendChild(doneBtn);
    li.appendChild(deleteBtn);
    tasksList.appendChild(li);
}



