import React from 'react';
import {
    Button, TextField, Dialog, Box, DialogTitle, Grid, FormControl, Select, MenuItem,
    AppBar, Toolbar, IconButton, Container, Slide
} from '@material-ui/core';
import { Close } from '@material-ui/icons'
import Skeleton from 'react-loading-skeleton'
import { DynamicForm, CRUDModes, getFormattedDate, getCascadeDropdownValues } from './Config'

const DialogTransition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
});

export default class FormDialog extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            formBody: null,
            dynamicStates: {}
        }
    }
    componentDidUpdate(prevProps) {
        if (prevProps !== this.props) {
            this.setState({
                formBody: null,
                dynamicStates: {}
            }, this.generateDynamicForm)
        }
    }
    handleSubmit = (e) => {
        e.preventDefault()
        let fd = new FormData(e.target)
        let obj = {}
        fd.forEach((value, key) => { obj[key] = value });
        this.props.onSave(obj)
    }
    handleChange(e, id) {
        let obj = this.state.dynamicStates
        obj[id] = e.target.value
        let formFields = this.props.formFields
        formFields.map(field => {
            if (field.controlParam && field.controlParam[0] === id) {
                let param = {}
                param[id] = e.target.value
                getCascadeDropdownValues(field.controlParam[1], param)
                    .then(res => {
                        field.dropdownValues = res
                        this.generateDynamicForm()
                    })
            }
            return null
        })
        this.setState({
            dynamicStates: obj,
        }, this.generateDynamicForm)
    }
    generateDynamicForm() {
        let formFields = this.props.formFields
        let breakPoint = 0, nofield = 0, nofieldCount = 0
        let tempObj = []
        let generatedForm =
            formFields.map(field => {
                let savedValue = (this.props.mode === CRUDModes.Update) && this.props.formData[field.id]
                let rawObj = null
                switch (field.objectType) {
                    case DynamicForm.TextField:
                        rawObj = <TextField name={field.id} label={field.label} type={field.inputType}
                            defaultValue={savedValue || null}
                            variant="outlined" margin="dense" autoComplete="off" fullWidth />
                        break;
                    case DynamicForm.DateField:
                        rawObj = <TextField name={field.id} label={field.label} type="date"
                            defaultValue={getFormattedDate(savedValue)} InputLabelProps={{ shrink: true }}
                            variant="outlined" margin="dense" autoComplete="off" fullWidth />
                        break;
                    case DynamicForm.SelectField:
                        rawObj = <FormControl variant="outlined" size="small" margin="dense" fullWidth>
                            <Select name={field.id} value={this.state.dynamicStates[field.id] || savedValue || field.defaultValue || -1}
                                onChange={(e) => this.handleChange(e, field.id)}
                            >
                                <MenuItem value="-1" disabled><em>{field.label}</em></MenuItem>
                                {field.dropdownValues.map(item => {
                                    return <MenuItem value={item.Value}>{item.Text}</MenuItem>
                                })}
                            </Select>
                        </FormControl>
                        break;
                    case DynamicForm.noField:
                        nofield = 1
                        nofieldCount++
                        break
                    default:
                        return console.log("Error Object Type : " + field.objectType)
                }
                if (nofield === 0) {
                    tempObj.push(<Grid item xs={12} sm={4}> {rawObj} </Grid>)
                    breakPoint++
                    if (breakPoint % 3 === 0 || breakPoint === formFields.length - nofieldCount) {
                        let temp = <Grid container spacing={3}>{tempObj}</Grid>
                        tempObj = []
                        return temp
                    }
                }
                else
                    nofield = 0
                return null
            })
        this.setState({
            formBody: generatedForm
        })
    }
    render() {
        return (
            <React.Fragment>
                <Dialog fullScreen open={this.props.trigger} onClose={this.props.onDismiss} TransitionComponent={DialogTransition}>
                    <AppBar elevation={0} position="sticky">
                        <Toolbar>
                            <IconButton edge="start" color="inherit" onClick={this.props.onDismiss}>
                                <Close />
                            </IconButton>
                            <DialogTitle>{this.props.mode}</DialogTitle>
                        </Toolbar>
                    </AppBar>
                    <Container>
                        <form onSubmit={this.handleSubmit.bind(this)}>
                            <Box my={3} >
                                {this.state.formBody || <Skeleton count={5} height={50} />}
                            </Box>
                            <Button type="submit" color="primary" variant="contained" fullWidth disableElevation>Save</Button>
                        </form>
                    </Container>
                </Dialog>
            </React.Fragment >
        );
    }
}
