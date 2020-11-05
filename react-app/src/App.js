import React from 'react'
import CRUDTable from "./components/CRUDFramework/CRUDTable"
import { Configure_Contact } from './components/CRUDFramework/Config'
import { Container, Box, Drawer, List, ListItem, ListItemText, Divider, AppBar, Toolbar, IconButton, Typography } from '@material-ui/core'
import { Menu } from '@material-ui/icons'

export class App extends React.Component {
  constructor() {
    super()
    this.state = {
      rows: [{
        '_id': '1233',
        'Name': 'Suman',
        'Location': 'Kolkata',
        'Phone': '123'
      }],
      columns: Configure_Contact,
      drawerOpen: false,
    }
  }
  handleCreateDoc() { }
  handleDeleteDoc() { }
  handleUpdateDoc() { }
  toggleDrawer = () => {
    this.setState({ drawerOpen: !this.state.drawerOpen })
  }
  render() {
    return (
      <React.Fragment>
        <AppBar position="static">
          <Toolbar variant="dense">
            <IconButton edge="start" color="inherit" onClick={this.toggleDrawer}><Menu /></IconButton>
            <Typography variant="h6" color="inherit">Dashboard</Typography>
          </Toolbar>
        </AppBar>
        <Drawer open={this.state.drawerOpen} onClose={this.toggleDrawer}>
          <ListItem key="menus">
            <Typography variant="h5" color="inherit">Menus</Typography>
          </ListItem>
          <Divider />
          <List>
            {['Inbox', 'Starred', 'Send email', 'Drafts'].map((text, index) => (
              <ListItem button key={text}>
                {/* <ListItemIcon>{index % 2 === 0 ? <InboxIcon /> : <MailIcon />}</ListItemIcon> */}
                <ListItemText primary={text} />
              </ListItem>
            ))}
          </List>
          <Divider />
        </Drawer>
        <Container>
          <Box my={3}>
            <CRUDTable rows={this.state.rows} columns={this.state.columns}
              onCreate={this.handleCreateDoc} onUpdate={this.handleUpdateDoc} onDelete={this.handleDeleteDoc} />
          </Box>
        </Container>
      </React.Fragment>
    );
  }
}

export default App;
