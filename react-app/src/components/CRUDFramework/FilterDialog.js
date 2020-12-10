import React from 'react';
import {
    Button, Dialog, Box, DialogTitle, FormControl,
    AppBar, Toolbar, IconButton, Container, Slide, Typography, FormGroup, FormControlLabel, Checkbox
} from '@material-ui/core';
import { Close } from '@material-ui/icons'
import Skeleton from 'react-loading-skeleton'
import { DynamicForm, generateUniqueKeys } from './Config'

const DialogTransition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
});

export default class FilterDialog extends React.Component {
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
        fd.forEach((value, key) => {
            if (!obj[key])
                obj[key] = []
            obj[key].push(value)
        })
        this.props.onSave(obj)
    }
    handleChange(e, id) {
        let obj = this.state.dynamicStates
        obj[id] = e.target.checked
        this.setState({
            dynamicStates: obj,
        }, this.generateDynamicForm)
    }

    generateDynamicForm() {
        let filterFields = this.props.filterFields
        let generatedForm =
            filterFields.map(field => {
                // let savedValue = (this.props.mode === CRUDModes.Update) && this.props.formData[field.id]
                if (field.objectType === DynamicForm.SelectField) {
                    return <Box key={generateUniqueKeys(field.id)} my={3} >
                        <Typography variant="subtitle2" color="primary">{field.label}</Typography>
                        <FormControl variant="outlined" size="small" margin="dense" fullWidth>
                            <FormGroup>
                                {field.dropdownValues.map(item => {
                                    return <FormControlLabel key={generateUniqueKeys(field.id)}
                                        control={<Checkbox checked={this.state.dynamicStates[item.Value] || (this.state.dynamicStates[item.Value] !== false && Array.isArray(this.props.filterFieldValues[field.id]) && this.props.filterFieldValues[field.id].includes(item.Value))} name={field.id} value={item.Value} />}
                                        label={item.Text}
                                        onChange={(e) => this.handleChange(e, item.Value)} />
                                })}
                            </FormGroup>
                            {/* value={this.state.dynamicStates[field.id] || savedValue || field.defaultValue || -1}*/}
                        </FormControl>
                    </Box>
                }
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
                            <DialogTitle>Filter</DialogTitle>
                        </Toolbar>
                    </AppBar>
                    <Container>
                        <form onSubmit={this.handleSubmit.bind(this)}>
                            {this.state.formBody || <Skeleton count={5} height={50} />}
                            <Button type="submit" color="primary" variant="contained" fullWidth disableElevation>Apply Filter</Button>
                        </form>
                    </Container>
                </Dialog>
            </React.Fragment >
        );
    }
}