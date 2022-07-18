// ? JuanCruzAGB | Source package
import Callback from "./Callback.js";
import Property from "./Property.js";
import State from "./State.js";

/**
 * * Controls a class object.
 * @export
 * @class Class
 * @author Juan Cruz Armentia <juan.cruz.armentia@gmail.com>
 */
export default class Class {
    /**
     * * Creates an instance of Class.
     * @param {object} [data] Class data.
     * @param {object} [data.callbacks] Class callbacks.
     * @param {object} [data.props] Class properties.
     * @param {object} [data.state] Class state
     * @memberof Class
     */
    constructor (data = {
        callbacks: {},
        props: {},
        state: {},
    }) {
        this.props.set((data && data.hasOwnProperty('props')) ? data.props : {});
        this.state.set((data && data.hasOwnProperty('state')) ? data.state : {});
        this.callbacks.set((data && data.hasOwnProperty('callbacks')) ? data.callbacks : {});
    }

    /**
     * @var {Callback} callbacks
     * @memberof Class
     */
    callbacks = Callback

    /**
     * @var {Property} props
     * @memberof Class
     */
    props = Property

    /**
     * @var {State} state
     * @memberof Class
     */
    state = State
}