const toDoInput = document.querySelector(".to-do-input");
const toDoButton = document.querySelector(".to-do-button");
const toDoList = document.querySelector(".to-do-list")

toDoButton.addEventListener("click", AddToDo);
toDoList.addEventListener("click", DeleteCheck);



function AddToDo(event)
{
      //hogy ne frissüljön az oldal
//event.preventDefault();
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
//toDoInput.value = "";
    }
}


//törlés és kész gombok 
function DeleteCheck(event)
//benne van a done is
{
const item = event.target;
if (item.classList[0] === "deleteButton")
{
    const azegesztodo = item.parentElement; //muszaj a parent elementet torolni mert különben csak a gomb torlodik.
    azegesztodo.remove();
}
if(item.classList[0] === "doneButton")
{
    const azegesztodo = item.parentElement;
    azegesztodo.classList.toggle("done");
}

}

//nyomtatas
function printContent(){
    let restorePage = document.body.innerHTML; //elmenti az eredeti weboldalt, hogy aztán vissza lehessen állítani az eredetire
    let deleteGombokElrejtese = document.querySelectorAll('.deleteButton');
    for (i = 0; i < deleteGombokElrejtese.length; i++) {
        deleteGombokElrejtese[i].classList.add('rejtett'); //hozzaad egy classt a delete gombhoz, hogy aztan css-ben elrejthesd
      }
    
      let doneButtonAtiras = document.querySelectorAll('.doneButton');
      for (i = 0; i < doneButtonAtiras.length; i++){
        doneButtonAtiras[i].innerHTML = " "
      }
      
    //DeleteHide.style.display = 'none';
    //completeHide.innerHTML = " "
    var Print = document.querySelector('.to-do-list').innerHTML;
    document.body.innerHTML = Print;
    window.print();
    document.body.innerHTML = restorePage;
}