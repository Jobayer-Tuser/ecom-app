import {createContext} from "react";

const stateContext = createContext({
    currentUser: null,
    _token: null,
})
