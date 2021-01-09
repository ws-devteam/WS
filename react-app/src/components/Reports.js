import React from 'react';
import {
    List, ListItem, ListItemAvatar, ListItemText, Grid, Box, Avatar, Typography, Card, CardActionArea, Collapse,
    Tooltip, Button, ButtonGroup, CardContent
} from "@material-ui/core"
import { green, red } from '@material-ui/core/colors'
import { CallMade, CallReceived, Phone, AlternateEmail, LocationOnOutlined, PersonOutlineOutlined, FilterList } from '@material-ui/icons'
import { REST_API, getFormattedDate, BlankResult, TransactionForm, getDynamicForm, generateUniqueKeys } from './CRUDFramework/Config'
import FilterDialog from "./CRUDFramework/FilterDialog";
import Skeleton from "react-loading-skeleton"
import 'react-date-range/dist/styles.css' // main css file
import 'react-date-range/dist/theme/default.css' // theme css file
import { DateRange } from 'react-date-range'
import axios from 'axios'

export default class Reports extends React.Component {
    constructor() {
        super()
        this.state = {
            dyncamicCardExpand: {},
            fetchedRows: null,
            income: 0,
            expenditure: 0,
            fetchedFilters: null,
            dateRangeSelection: [{
                startDate: new Date((new Date()).setDate(new Date().getDate() - 2)),
                endDate: new Date(),
                key: 'dateRangeSelection'
            }],
            filterFieldValues: {},
            openFilterDialog: false,
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
        this.fetchReport()
    }
    fetchReport() {
        getDynamicForm(TransactionForm)
            .then((resp) => this.setState({ fetchedFilters: resp }))
            .catch(e => console.error(e))
        this.callReportAPI()
    }
    callReportAPI() {
        axios.post(REST_API.link, {
            f: REST_API.methods.readExtended, sqlKey: "fetchReports",
            sqlConditions: {
                startDate: getFormattedDate(this.state.dateRangeSelection[0].startDate),
                endDate: getFormattedDate(this.state.dateRangeSelection[0].endDate),
                filters: this.state.filterFieldValues,
            }
        })
            .then(resp => {
                let _income = 0, _expenditure = 0;
                (resp.data).map(t => {
                    if (t.TransactionType === "Income")
                        _income += Number(t.Amount)
                    else if (t.TransactionType === "Expenditure")
                        _expenditure += Number(t.Amount)
                    return 1
                })
                this.setState({ fetchedRows: resp.data || [], income: _income, expenditure: _expenditure })
            })
            .catch(e => console.error(e))
    }
    handleDateChange = (item) => {
        this.setState({ dateRangeSelection: [item.dateRangeSelection], fetchedRows: null }, this.fetchReport)
    }
    handleDialogDismiss = () => {
        this.setState({ openFilterDialog: !this.state.openFilterDialog })
    }
    handleFilterSubmit = (savedFiltersData) => {
        this.setState({ filterFieldValues: savedFiltersData }, this.callReportAPI)
        this.handleDialogDismiss()
    }
    render() {
        return (
            <React.Fragment>
                {this.state.fetchedFilters !== null && <FilterDialog trigger={this.state.openFilterDialog} onDismiss={this.handleDialogDismiss} onSave={this.handleFilterSubmit} filterFields={this.state.fetchedFilters} filterFieldValues={this.state.filterFieldValues} />}
                <Grid container spacing={2} alignItems="center">
                    <Grid item sm>
                        <DateRange editableDateInputs={true} onChange={(item) => this.handleDateChange(item)}
                            moveRangeOnFirstSelection={false}
                            ranges={this.state.dateRangeSelection} />
                    </Grid>
                    <Grid item sm>
                        <Card elevation={2}>
                            <CardContent>
                                <ListItem alignItems="flex-start">
                                    <ListItemAvatar>
                                        <Avatar style={{ backgroundColor: green[500] }}> <CallReceived /> </Avatar>
                                    </ListItemAvatar>
                                    <ListItemText primary="Total Income" secondary={
                                        <React.Fragment>
                                            {new Date(this.state.dateRangeSelection[0].startDate).toLocaleDateString('en-GB', {
                                                year: 'numeric', month: 'short', day: 'numeric'
                                            })} {" - "}
                                            {new Date(this.state.dateRangeSelection[0].endDate).toLocaleDateString('en-GB', {
                                                year: 'numeric', month: 'short', day: 'numeric'
                                            })}
                                        </React.Fragment>
                                    } />
                                    <Box alignItems="right">
                                        <Typography variant="h6">₹ {this.state.income}</Typography>
                                    </Box>
                                </ListItem>
                            </CardContent>
                            <CardContent>
                                <ListItem alignItems="flex-start">
                                    <ListItemAvatar>
                                        <Avatar style={{ backgroundColor: red[500] }}> <CallMade /> </Avatar>
                                    </ListItemAvatar>
                                    <ListItemText primary="Total Expenditure" secondary={
                                        <React.Fragment>
                                            {new Date(this.state.dateRangeSelection[0].startDate).toLocaleDateString('en-GB', {
                                                year: 'numeric', month: 'short', day: 'numeric'
                                            })} {" - "}
                                            {new Date(this.state.dateRangeSelection[0].endDate).toLocaleDateString('en-GB', {
                                                year: 'numeric', month: 'short', day: 'numeric'
                                            })}
                                        </React.Fragment>
                                    } />
                                    <Box alignItems="right">
                                        <Typography variant="h6">₹ {this.state.expenditure}</Typography>
                                    </Box>
                                </ListItem>
                            </CardContent>
                        </Card>
                    </Grid>
                </Grid>

                <Box display="flex" justifyContent="flex-end" p={1} bgcolor="grey.200">
                    <ButtonGroup variant="text" color="primary">
                        <Tooltip title="Filter">
                            <Button onClick={() => this.setState({ openFilterDialog: !this.state.openFilterDialog })}><FilterList /></Button>
                        </Tooltip>
                    </ButtonGroup>
                </Box>

                <List>
                    {
                        (this.state.fetchedRows === null && <Skeleton count={5} height={50} />)
                        ||
                        (this.state.fetchedRows.length === 0 && <BlankResult />)
                        ||
                        (
                            this.state.fetchedRows.map(t => {
                                return (
                                    <Card key={generateUniqueKeys(t._id)}>
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