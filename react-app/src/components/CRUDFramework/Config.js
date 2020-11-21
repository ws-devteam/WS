import axios from 'axios'
export const REST_API = {
    link: "http://localhost/WS/BL/api.php",
    methods: {
        fetchField: "fetchField",
        create: "create",
        read: "read",
        update: "update",
        delete: "delete",
    }
}

export const DynamicForm = {
    TextField: 'TextField',
    DateField: 'DateField',
    SelectField: 'SelectField',
    NumberType: 'number'
}
export const CRUDModes = {
    Create: 'Create',
    Update: 'Update',
    Delete: 'Delete',
}

export const Configure_Contact = [
    { id: 'Name', label: 'Name', objectType: DynamicForm.TextField, required: true },
    { id: 'Location', label: 'Location', objectType: DynamicForm.TextField, required: true },
    { id: 'Phone', label: 'Phone', objectType: DynamicForm.TextField },
    { id: 'Email', label: 'Email', objectType: DynamicForm.TextField },
    { id: 'Notes', label: 'Notes', objectType: DynamicForm.TextField }
];

export const TransactionForm = [
    { id: 'TransactionDate', label: 'Date', objectType: DynamicForm.DateField, required: true },
    { id: 'TransactionType', label: 'Type', objectType: DynamicForm.SelectField, required: true, dropdownValues: 'Income;Expenditure' },
    { id: 'Name', label: 'Name', objectType: DynamicForm.SelectField, required: true, dropdownValues: ['contacts', 'Name'] },
    { id: 'Amount', label: 'Amount', objectType: DynamicForm.TextField, required: true, inputType: DynamicForm.NumberType },
    { id: 'Notes', label: 'Notes', objectType: DynamicForm.TextField, required: true, inputType: DynamicForm.TextField },
];

export const getDynamicForm = (frmObj) => {
    let inputForm = JSON.parse(JSON.stringify(frmObj))  //Clone object without reference
    return new Promise((resolve, reject) => {
        const allPromiseList = []
        inputForm.map((field, i) => {
            switch (field.objectType) {
                case DynamicForm.SelectField:
                    if (typeof (field.dropdownValues) === 'object') {
                        allPromiseList.push(
                            fillDropdownValues(field.dropdownValues)
                                .then(res => {
                                    inputForm[i].dropdownValues = res
                                })
                                .catch(e => reject(e)))
                    }
                    else {
                        inputForm[i].dropdownValues = field.dropdownValues.split(';').map((f, x) => f)
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
        axios.post(REST_API.link, { f: REST_API.methods.fetchField, collectionParam: dropDownValObj[0], fieldParam: dropDownValObj[1] })
            .then(resp => {
                let temp = {}
                temp = resp.data.map(obj => obj[dropDownValObj[1]])
                resolve(temp)
            })
            .catch(e => reject(e))
    })
}