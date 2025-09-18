

//logout with fetch methode
document.querySelector('.logoutbtn').addEventListener('click', function () {
    const token = localStorage.getItem('api_token');
    if (!token) {
        alert('No token found, please login first.');
        return;
    }
    fetch('/api/logout', {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`,
            "Accept": 'application/json',
            'Content-Type': 'application/json',
        }

    })
        .then(response => response.json())
        .then(data => {
            localStorage.removeItem('api_token');
            console.log(data);
            window.location.href = '/';
        })
});


//addnew todo with fetch methode
var addtodoForm = document.querySelector('#addTodo-form');
addtodoForm.onsubmit = function (e) {
    e.preventDefault();
    const token = localStorage.getItem('api_token');
    var title = document.querySelector('#title').value;
    var desc = document.querySelector('#desc').value;
    var due_date = document.querySelector('#due_date').value;
    var status = document.querySelector('#status').value;
    //console.log(title, desc, due_date, status);

    /*var formdata = new FormData();
    formdata.append('title', title);
    formdata.append('description', desc);
    formdata.append('due_date', due_date);
    formdata.append('status', status);*/

    fetch('/api/todos', {
        method: 'POST',
        //body: formdata,
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            title: title,
            description: desc,
            due_date: due_date,
            status: status
        })

    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            $('#addtodoModal').modal('hide'); // jQuery required
            loadData();

        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// delete todo record
async function deletTodo(todoid) {
    const token = localStorage.getItem('api_token');

    await fetch(`/api/todos/${todoid}`, {
        method: 'DELETE',
        headers: {
            'Authorization': `Bearer ${token}`,
            "Accept": 'application/json',
            'Content-Type': 'application/json',
        }

    })
        .then(response => response.json())
        .then(data => {
            //console.log(data);
            loadData();
            alert('data successfully deleted');
        })

}

//show all todo with fetch methode
function loadData() {
    const token = localStorage.getItem('api_token');
    fetch('/api/todos', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
        }
    })
        .then(response => response.json())
        .then(data => {
            //console.log(data.data.todos); 
            var alltodos = data.data.todos;
            var tableContainer = document.querySelector('.table-data');

            var tabledata = `<table>
            <thead class='table-dark'>
              <tr>
                <th scope="col">User_Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">status</th>
                <th scope="col">Due_Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody id="tbody">`;

            alltodos.forEach(function (todo) {
                tabledata += `<tr>
                 
                  <td>${todo.user_id}</td>
                  <td>${todo.title}</td>
                  <td>${todo.description}</td>
                  <td>${todo.status}</td>
                  <td>${todo.due_date}</td>
                  <td><button class="btn btn-sm btn-warning" data-todosid="${todo.todo_id}" data-toggle="modal" data-target="#updateTodoModel">Edit</button></td>
                  <td><button class="btn btn-sm btn-danger" onclick="deletTodo(${todo.todo_id})"> Delete</button></td>

                </tr>`;
            });
            tabledata += `</tbody></table>`;
            tableContainer.innerHTML = tabledata;
            tableContainer.innerHTML = tabledata;
        });

}
loadData();

//update todos
var updateTodoModel = document.querySelector('#updateTodoModel');
if (updateTodoModel) {
    $('#updateTodoModel').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const td_id = button.data('todosid');
        //console.log(todo_id);

        const token = localStorage.getItem('api_token');
        fetch(`/api/todos/${td_id}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json',
            }
        })
            .then(response => response.json())
            .then(data => {
                //var TodtoData = JSON.stringify(data);
                var TodtoData = data.data[0];
                console.log(TodtoData);

                document.querySelector("#td_id").value = TodtoData.todo_id;
                document.querySelector("#todo_title").value = TodtoData.title;
                document.querySelector("#todo_desc").value = TodtoData.description;
                document.querySelector("#todo_status").value = TodtoData.status;
                document.querySelector("#todo_due_date").value = TodtoData.due_date;

            })

    });
}

//update single todo
var updatetodoForm = document.querySelector('#formupdate');
updatetodoForm.onsubmit = async (e) =>{
    e.preventDefault();
    const token = localStorage.getItem('api_token');
    var tod_id = document.querySelector('#td_id').value;
    var title = document.querySelector('#todo_title').value;
    var desc = document.querySelector('#todo_desc').value;
    var status = document.querySelector('#todo_status').value;
    var due_date = document.querySelector('#todo_due_date').value;
    console.log(tod_id,title, desc, due_date, status);

    /*var formdata = new FormData();
    formdata.append('tod_id',  tod_id);
    formdata.append('title', title);
    formdata.append('description', desc);
    formdata.append('due_date', due_date);
    formdata.append('status', status);*/

    let response = await fetch(`/api/todos/${tod_id}`, {
        method: 'PUT',
        //body: formdata,
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            //'X-HTTP-Method-Override' : 'PUT'
        },
        body: JSON.stringify({
            todo_id :tod_id,
            title: title,
            description: desc,
            status: status,
            due_date: due_date
        })

    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
           $('#updateTodoModel').modal('hide'); 
            loadData();

        })
        .catch(error => {
            console.error('Error:', error);
        });
}

//search
 document.querySelector('#search').addEventListener('keyup', function () {
    const token = localStorage.getItem('api_token');
    if (!token) {
        alert('No token found, please login first.');
        return;
    }

    const searchValue = this.value; 

    fetch(`/api/todos?search=${encodeURIComponent(searchValue)}`, {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        //console.log("Search Results:", data);
           //console.log(data.data.todos); 
            var alltodos = data.data.todos;
           // var alltodos = data;
            var tableContainer = document.querySelector('.table-data');
            tableContainer.innerHTML="";

            var tabledata = `<table>
            <thead class='table-dark'>
              <tr>
                <th scope="col">User_Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">status</th>
                <th scope="col">Due_Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody id="tbody">`;

            alltodos.forEach(function (todo) {
                tabledata += `<tr>
                 
                  <td>${todo.user_id}</td>
                  <td>${todo.title}</td>
                  <td>${todo.description}</td>
                  <td>${todo.status}</td>
                  <td>${todo.due_date}</td>
                  <td><button class="btn btn-sm btn-warning" data-todosid="${todo.todo_id}" data-toggle="modal" data-target="#updateTodoModel">Edit</button></td>
                  <td><button class="btn btn-sm btn-danger" onclick="deletTodo(${todo.todo_id})"> Delete</button></td>
                  

                </tr>`;
            });
            tabledata += `</tbody></table>`;
            tableContainer.innerHTML = tabledata;
            tableContainer.innerHTML = tabledata;
    })
    .catch(error => console.error("Error:", error));
});



 



