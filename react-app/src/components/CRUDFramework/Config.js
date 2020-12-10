import axios from 'axios'
import { Alert } from '@material-ui/lab'
import { File } from 'react-kawaii'
import { Box } from '@material-ui/core'

export const REST_API = {
    link: "http://localhost/WS/BL/api.php",
    methods: {
        fetchField: "fetchField",
        create: "create",
        read: "read",
        update: "update",
        delete: "delete",
        readExtended: "readExtended",
    }
}

export const DynamicForm = {
    TextField: "TextField",
    DateField: "DateField",
    SelectField: "SelectField",
    NumberType: "number",
    noField: "noField",
}
export const CRUDModes = {
    Create: "Create",
    Update: "Update",
    Delete: "Delete",
}

export const Configure_Event = [
    { id: "Name", label: "Event Name", objectType: DynamicForm.TextField, required: true },
    { id: "Notes", label: "Notes", objectType: DynamicForm.TextField }
];

export const Configure_Contact = [
    { id: "Name", label: "Name", objectType: DynamicForm.TextField, required: true },
    { id: "Location", label: "Location", objectType: DynamicForm.TextField, required: true },
    { id: "Phone", label: "Phone", objectType: DynamicForm.TextField },
    { id: "Email", label: "Email", objectType: DynamicForm.TextField },
    { id: "Notes", label: "Notes", objectType: DynamicForm.TextField },
    { id: "Status", label: "Status", objectType: DynamicForm.SelectField, required: true, dropdownValues: [{ Text: "Active", Value: "Active" }, { Text: "Inactive", Value: "Inactive" }] },
];

export const TransactionForm = [
    { id: "TransactionDate", label: "Date", objectType: DynamicForm.DateField, required: true },
    { id: "TransactionType", label: "Type", objectType: DynamicForm.SelectField, required: true, dropdownValues: [{ Text: "Income", Value: "Income" }, { Text: "Expenditure", Value: "Expenditure" }] },
    { id: "Name", label: "Name", objectType: DynamicForm.noField },
    { id: "ContactID", label: "Contact ID", objectType: DynamicForm.SelectField, required: true, dropdownValues: ["contacts", "Name,' (',_id,')'", "_id"], hideInTable: true },
    { id: "Event", label: "Event", objectType: DynamicForm.noField },
    { id: "EventID", label: "Event ID", objectType: DynamicForm.SelectField, required: true, dropdownValues: ["events", "Name,' (',_id,')'", "_id"], hideInTable: true },
    { id: "Amount", label: "Amount", objectType: DynamicForm.TextField, required: true, inputType: DynamicForm.NumberType },
    { id: "Notes", label: "Notes", objectType: DynamicForm.TextField, required: true, inputType: DynamicForm.TextField },
];

export const getDynamicForm = (frmObj) => {
    let inputForm = JSON.parse(JSON.stringify(frmObj))  //Clone object without reference
    return new Promise((resolve, reject) => {
        const allPromiseList = []
        inputForm.map((field, i) => {
            switch (field.objectType) {
                case DynamicForm.SelectField:
                    if (typeof (field.dropdownValues[0]) === "string") {
                        allPromiseList.push(
                            fillDropdownValues(field.dropdownValues)
                                .then(res => inputForm[i].dropdownValues = res)
                                .catch(e => reject(e))
                        )
                    }
                    break;
                default:
                    break;
            }
            return 1
        })
        Promise.all(allPromiseList).then(() => resolve(inputForm))
    })
}

const fillDropdownValues = (dropDownValObj) => {
    return new Promise((resolve, reject) => {
        axios.post(REST_API.link, { f: REST_API.methods.fetchField, collectionParam: dropDownValObj[0], textParam: dropDownValObj[1], valueParam: dropDownValObj[2] })
            .then(resp => resolve(resp.data))
            .catch(e => reject(e))
    })
}
export function getFormattedDate(dt) {
    dt = (dt && new Date(dt)) || new Date()
    let month = dt.getMonth() + 1
    let day = dt.getDate()
    return dt.getFullYear() + "-" + (month < 10 ? 0 : '') + month + "-" + (day < 10 ? 0 : '') + day
}
export const BlankResult = () => {
    return <Box p={3}>
        <Box justifyContent="center" display="flex">
            <File size={200} mood="ko" color="#83D1FB" />
        </Box>
        <Alert severity="info" variant="outlined">Nothing is there!</Alert>
    </Box>
}
export function generateUniqueKeys(data) {
    return data + "_" + new Date().getTime() + Math.random() * 100
}