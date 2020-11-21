import React from 'react'
import CRUDTable from "./components/CRUDFramework/CRUDTable"
import { Configure_Contact, TransactionForm, getDynamicForm, REST_API } from './components/CRUDFramework/Config'
import { Container, Box, Drawer, List, ListItem, ListItemIcon, ListItemText, Divider, AppBar, Toolbar, IconButton, Typography } from '@material-ui/core'
import { Menu, AccountBalanceWallet, AccountCircle } from '@material-ui/icons'
import axios from 'axios'

export class App extends React.Component {
  constructor() {
    super()
    this.state = {
      rows: null,
      columns: null,
      drawerOpen: false,
      selectedMenu: null,
    }
  }
  menuConfig = [
    { Label: 'Transactions', Columns: TransactionForm, icon: <AccountBalanceWallet /> },
    { Label: 'Contacts', Columns: Configure_Contact, icon: <AccountCircle /> }
  ]
  handleCreateDoc = (doc) => {
    axios.post(REST_API.link, { f: REST_API.methods.create, collectionParam: this.state.selectedMenu, formData: doc })
      .then(resp => this.setState({ rows: resp.data }))
      .catch(e => console.error(e))
  }
  handleUpdateDoc = (docID, doc) => {
    axios.post(REST_API.link, { f: REST_API.methods.update, collectionParam: this.state.selectedMenu, _id: docID, formData: doc })
      .then(resp => this.setState({ rows: resp.data }))
      .catch(e => console.error(e))
  }
  handleDeleteDoc = (docID) => {
    axios.post(REST_API.link, { f: REST_API.methods.delete, collectionParam: this.state.selectedMenu, _id: docID })
      .then(resp => this.setState({ rows: resp.data }))
      .catch(e => console.error(e))
  }
  toggleDrawer = () => {
    this.setState({ drawerOpen: !this.state.drawerOpen })
  }
  handleMenuChange = (txt, i) => {
    this.setState({ selectedMenu: txt }, () => this.fetchAll(i))
    this.toggleDrawer()
  }
  fetchAll(i) {
    let promisesList = []
    promisesList.push(getDynamicForm(this.menuConfig[i].Columns)
      .then((resp) => this.fetchedForm = resp)
      .catch(e => console.error(e)))
    promisesList.push(axios.post(REST_API.link, { f: REST_API.methods.read, collectionParam: this.menuConfig[i].Label })
      .then(resp => {
        this.fetchedRows = resp.data
        console.log(resp.data)
      })
      .catch(e => console.error(e)))
    Promise.all(promisesList).then(() => {
      this.setState({
        columns: this.fetchedForm || [],
        rows: this.fetchedRows || []
      })
    })
  }
  render() {
    return (
      <React.Fragment>
        <AppBar position="static">
          <Toolbar variant="dense">
            <IconButton edge="start" color="inherit" onClick={this.toggleDrawer}><Menu /></IconButton>
            <Typography variant="h6" color="inherit">{this.state.selectedMenu}</Typography>
          </Toolbar>
        </AppBar>
        <Drawer open={this.state.drawerOpen} onClose={this.toggleDrawer}>
          <ListItem key="menus">
            <Typography variant="h6" color="inherit">Welcome Suman!</Typography>
          </ListItem>
          <Divider />
          <List>
            {this.menuConfig.map((obj, index) => (
              <ListItem button key={obj.Label} onClick={() => this.handleMenuChange(obj.Label, index)}>
                <ListItemIcon>
                  {obj.icon}
                </ListItemIcon>
                <ListItemText primary={obj.Label} />
              </ListItem>
            ))}
          </List>
          <Divider />
        </Drawer>
        <Container>
          <Box my={3}>
            {
              this.state.rows !== null && this.state.columns !== null &&
              <CRUDTable rows={this.state.rows} columns={this.state.columns}
                onCreate={this.handleCreateDoc} onUpdate={this.handleUpdateDoc} onDelete={this.handleDeleteDoc} />
            }
          </Box>
        </Container>
      </React.Fragment>
    );
  }
}

export default App;
