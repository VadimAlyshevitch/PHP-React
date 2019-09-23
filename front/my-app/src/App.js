import React from 'react';
import './App.css';

class AddTaskForm extends React.Component {
  render() {
    return <div>
    <h2>{ this.props.text }</h2>
    <div>
      <input id="task-text" type="text"/>
    </div>
    <div>
      <button onClick={
        () => {
          const taskText = document.getElementById('task-text').value
          fetch('/api/addTask.php?addTask='+taskText)
            .then(() => {
              this.props.reloadTasks()
            })
        }
      }>Добавить</button>
    </div>

  </div>;
  }
}

class App extends React.Component {
  constructor(props) {
    super(props)
    this.state  = {
      isLoading: true,
      todoList: null,
    }
  }
  reloadTasks() {
    this.setState({
      isLoading: true,
    })
    fetch('/api/getTasks.php')
      .then(res => res.json())
      .then(tasks => {
        this.setState({
          isLoading: false,
          todoList: tasks,
        })
      })
  }

  componentDidMount() {
    this.reloadTasks()
  }
  render() {
    return <>
      <h1 id='title'>Todo list</h1>

      <AddTaskForm reloadTasks={() => {
        this.reloadTasks()
      }}
        text='Добавить таск'
      />

      {
        this.state.isLoading
          ? 'Загрузка'
          : this.state.todoList.map((todoItem, i) => {
            return <div key={i}>
              <p> id: {todoItem.id} task: {todoItem.task} <button onClick={() => {
                fetch('/api/deleteTask.php?del_tasl=' + todoItem.id)
                  .then(() => {
                    this.setState({
                      todoList: this.state.todoList.filter(item => item.id !== todoItem.id)
                    })
                  })
              }}>Удалить</button></p>
              
            </div>
          })
      }
    </>
  }
}

export default App;
