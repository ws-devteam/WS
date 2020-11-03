import React from 'react'
import CRUDTable from "./components/CRUDTable"

export class App extends React.Component {
  constructor() {
    super()
    this.state = {
      rows: [],
      columns: [],
    }
  }
  handleCreateDoc() { }
  handleDeleteDoc() { }
  handleUpdateDoc() { }
  render() {
    return (
      <React.Fragment>
        <CRUDTable rows={this.state.rows} columns={this.state.columns}
          onCreate={this.handleCreateDoc} onUpdate={this.handleUpdateDoc} onDelete={this.handleDeleteDoc} />
      </React.Fragment>
    );
  }
}

export default App;
