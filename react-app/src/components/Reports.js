import React from 'react';
import { List, ListItem, ListItemAvatar, ListItemText, Grid, Box, Avatar, Typography, Card, CardActionArea, Collapse } from "@material-ui/core"
import { green, red } from '@material-ui/core/colors'
import { CallMade, CallReceived, Phone, AlternateEmail, LocationOnOutlined, PersonOutlineOutlined } from '@material-ui/icons'
import { REST_API } from './CRUDFramework/Config'
import Skeleton from "react-loading-skeleton"
import axios from 'axios'

export default class Reports extends React.Component {
    constructor() {
        super()
        this.state = {
            dyncamicCardExpand: {},
            fetchedRows: null,
        }
    }
    handleClick = (id) => {
        let obj = this.state.dyncamicCardExpand
        obj[id] = !obj[id]
        this.setState({
            dyncamicCardExpand: obj,
        })
    }
    componentDidMount() {
        axios.post(REST_API.link, { f: REST_API.methods.readExtended, sqlKey: "fetchReports" })
            .then(resp => this.setState({ fetchedRows: resp.data || [] }))
    }
    render() {
        return (
            <React.Fragment>
                <List>
                    {
                        (this.state.fetchedRows === null && <Skeleton count={5} height={50} />)
                        ||
                        (
                            this.state.fetchedRows.map(t => {
                                return (
                                    <Card>
                                        <CardActionArea onClick={this.handleClick.bind(this, t._id)}>
                                            <ListItem alignItems="flex-start">
                                                <ListItemAvatar>
                                                    {t.TransactionType === "Income" && <Avatar style={{ backgroundColor: green[500] }}> <CallReceived /> </Avatar>}
                                                    {t.TransactionType === "Expenditure" && <Avatar style={{ backgroundColor: red[500] }}> <CallMade /> </Avatar>}
                                                </ListItemAvatar>
                                                <ListItemText primary={
                                                    <React.Fragment>
                                                        {t.Name}
                                                        <Typography component="span" variant="overline" color="textPrimary"> - {t.Event}</Typography>
                                                    </React.Fragment>} secondary={
                                                        new Date(t.TransactionDate).toLocaleDateString('en-GB', {
                                                            year: 'numeric', month: 'short', day: 'numeric'
                                                        })
                                                    } />
                                                <Box alignItems="right">
                                                    <Typography variant="h6">₹ {t.Amount}</Typography>
                                                </Box>
                                            </ListItem>
                                            <Collapse in={this.state.dyncamicCardExpand[t._id]} timeout="auto" unmountOnExit>
                                                <ListItem>
                                                    <Grid container spacing={2}>
                                                        <Grid item sm>
                                                            <Grid container direction="row" alignItems="center" spacing={2} aria-label="Phone">
                                                                <Grid item><Phone /></Grid>
                                                                <Grid item>
                                                                    <Typography variant="subtitle2">{t.Phone}</Typography>
                                                                </Grid>
                                                            </Grid>
                                                        </Grid>
                                                        <Grid item sm>
                                                            <Grid container direction="row" alignItems="center" spacing={2} aria-label="Email">
                                                                <Grid item><AlternateEmail /></Grid>
                                                                <Typography variant="subtitle2">{t.Email}</Typography>
                                                            </Grid>
                                                        </Grid>
                                                        <Grid item sm>
                                                            <Grid container direction="row" alignItems="center" spacing={2} aria-label="Location">
                                                                <Grid item><LocationOnOutlined /></Grid>
                                                                <Typography variant="subtitle2">{t.Location}</Typography>
                                                            </Grid>
                                                        </Grid>
                                                        <Grid item sm>
                                                            <Grid container direction="row" alignItems="center" spacing={2} aria-label="Status">
                                                                <Grid item><PersonOutlineOutlined /></Grid>
                                                                <Typography variant="subtitle2">{t.Status}</Typography>
                                                            </Grid>
                                                        </Grid>
                                                        <Grid item sm={12}>
                                                            <ListItemText secondary={t.Notes} />
                                                        </Grid>
                                                    </Grid>
                                                </ListItem>
                                            </Collapse>
                                        </CardActionArea>
                                    </Card>
                                )
                            })
                        )
                    }
                </List>
            </React.Fragment >
        );
    }
} 