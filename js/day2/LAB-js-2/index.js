//1
// while (true) {
//     let userInput = prompt("Enter your age (positive numbers only):");

//     if (userInput === null) {
//         // User clicked cancel or closed the prompt
//         break;
//     }

//     let age = Number(userInput);

//     if (Number.isNaN(age) || age <= 0) {
//         alert("Invalid input. Please enter a positive number.");
//         continue;
//     }

//     let status;

//     if (age >= 1 && age <= 10) {
//         status = "Child";
//     } else if (age >= 11 && age <= 18) {
//         status = "Teenager";
//     } else if (age >= 19 && age <= 50) {
//         status = "Grown up";
//     } else {
//         status = "Old";
//     }

//     alert(`Your status is: ${status}`);
// }

//2


//NOTE - 2
// function countVowels() {
//     let userInput = prompt("Enter a string ").toLocaleLowerCase()
//     let c = 0;

//     for (let i = 0; i < userInput.length; i++) {
//         if (userInput[i] == 'a' || userInput[i] == 'e' || userInput[i] == 'u' || userInput[i] == 'o' || userInput[i] == 'i') {
//             c++;
//         }

//     }
//     return c;
// }

// const res = countVowels()
// console.log(res);




function convertHour() {
    let userInput = prompt("Enter yhe hour")
    userInput = parseInt(userInput)
    if (userInput >= 1 && userInput <= 11) {
        return userInput + "AM"
    } else if (userInput === 0) {
        return "12AM"
    } else if (userInput === 12) {
        return "12PM"
    }
    else {
        let hour = Math.abs(userInput - 12)
        if (hour === 12) {
            return hour + "AM"
        }
        return hour + "PM"

    }

}

const hour = convertHour()
console.log(hour);




