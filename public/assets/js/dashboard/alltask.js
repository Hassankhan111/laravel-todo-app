
function alltask() {
    const token = localStorage.getItem('api_token');
    fetch('/api/todos', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
        }
    })
        .then(response => response.json())
        .then(data => {
            console.log(data.data.todos); 
            var alltodos = data.data.todos;
            var tableContainer = document.querySelector('.tasktable');

            var tabledata = `<table>
                   <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="todoTableBody">`;

            alltodos.forEach(function (todo) {
                tabledata += `<tr>
                              <td>${todo.todo_id}</td>
                              <td>${todo.title}</td>
                              <td>${todo.description}</td>
                              <td>${todo.status}</td>
                              <td>${todo.due_date}</td>
                              <td><button class="btn btn-sm btn-danger" onclick="Tododelete(${todo.todo_id})"> Delete</button></td>
                              </tr>`;
                            });
            tabledata += `</tbody></table>`;
            tableContainer.innerHTML = tabledata;
            tableContainer.innerHTML = tabledata;
        });

}
alltask();

// delte todo

async function Tododelete(todoid) {
    const token = localStorage.getItem('api_token');
 if (!confirm('Do you really want to delete this record?')) {
        return; 
    }
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
            alltask();
        })

}