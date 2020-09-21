const toDoInput = document.querySelector(".to-do-input");
const toDoButton = document.querySelector(".to-do-button");
const toDoList = document.querySelector(".to-do-list")

toDoButton.addEventListener("click", AddToDo);
toDoList.addEventListener("click", DeleteCheck);



function AddToDo(event)
{
      //hogy ne frissüljön az oldal
event.preventDefault();
    if(toDoInput.value != "")
    {
       
const toDoDiv = document.createElement("div");
toDoDiv.classList.add("todo");
//li
const newToDo = document.createElement('li');
newToDo.innerHTML = toDoInput.value;
newToDo.classList.add('toDoItem');
toDoDiv.appendChild(newToDo);
//kész gomb
const completedButton = document.createElement('button');
completedButton.innerHTML = 'Its Done!';
completedButton.classList.add('doneButton');
 toDoDiv.appendChild(completedButton);
//törlés
const deleteButton = document.createElement('button');
deleteButton.innerHTML = 'Delete';
deleteButton.classList.add('deleteButton');
toDoDiv.appendChild(deleteButton);
//listához adás
toDoList.appendChild(toDoDiv);
toDoInput.value = "";
    }
}