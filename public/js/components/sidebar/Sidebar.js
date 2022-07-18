// ? JuanCruzAGB repository
import Class from '../src/Class.js';

// ? Dropdown repository
import Button from "./Button.js";
import Link from "./Link.js";

/**
 * * Sidebar makes an excellent sidebar.
 * @export
 * @class Sidebar
 * @author Juan Cruz Armentia <juan.cruz.armentia@gmail.com>
 * @extends Class
 */
export default class Sidebar extends Class {
    constructor (data = {
        callbacks: {
            active: {
                function: (params) => { /* console.log(params); */ },
                params: {},
            }, close: {
                function: (params) => { /* console.log(params); */ },
                params: {},
            }, open: {
                function: (params) => { /* console.log(params); */ },
                params: {},
            }, switch: {
                function: (params) => { /* console.log(params); */ },
                params: {},
            },
        },
        props: {
            id: "sidebar-1",
        },
        state: {
            current: false,
            open: false,
            viewport: {
                "425": false,
                "768": false,
                "1024": false,
                "1336": false,
                "1536": false,
                "1920": false,
            },
        },
    }) {
        super({
            callbacks: {
                ...Sidebar.callbacks,
                ...(data && data.hasOwnProperty("callbacks")) ? data.callbacks : {},
            },
            props: {
                ...Sidebar.props,
                ...(data && data.hasOwnProperty("props")) ? data.props : {},
            },
            state: {
                ...Sidebar.state,
                ...(data && data.hasOwnProperty("state")) ? data.state : {},
            },
        });

        this.html = document.querySelector(`#${ this.props.id }.sidebar`);
        this.setButtons();
        this.setLinks();
        this.checkState();
    }

    /**
     * * Set the Sidebar Buttons.
     * @memberof Sidebar
     */
    setButtons () {
        this.buttons = Button.generate(this);
    }

    /**
     * * Set the Sidebar Links.
     * @memberof Sidebar
     */
    setLinks () {
        this.links = Link.generate(this);
    }

    /**
     * * Check the Sidebar state values.
     * @memberof Sidebar
     */
    checkState () {
        this.checkCurrentState();
        this.checkOpenState();
    }

    /**
     * * Check the NavMenu current state value.
     * @memberof NavMenu
     */
    checkCurrentState () {
        if (this.state.current) {
            this.active(this.state.current);
        }
    }

    /**
     * * Check the Sidebar open state.
     * @memberof Dropdown
     */
    checkOpenState () {
        if (this.state.hasOwnProperty("viewport")) {
            open = false;

            for (const width in this.state.viewport) {
                if (Object.hasOwnProperty.call(this.state.viewport, width)) {
                    if (window.outerWidth >= width) open = this.state.viewport[width];
                }
            }

            switch (open) {
                case true:
                    this.open();
                    break;

                case false:
                    this.close();
                    break;
            }
        }
    }

    /**
     * * Change the Sidebar Link active.
     * @param {string} current
     * @param {object} params Active callback function params.
     * @returns {boolean}
     * @memberof Sidebar
     */
    active (current = false, params = {}) {
        if (current) {
            this.state.set("current", current);
            let found = false;

            for (const link of this.links) {
                if (link.props.target == this.state.current) {
                    link.active();
                    found = link;
                }
                if (link.props.target != this.state.current) {
                    link.inactive();
                }
            }

            if (this.callbacks.has("active")) {
                this.callbacks.execute("active", {
                    ...params,
                    current: current,
                    link: found,
                    Sidebar: this,
                });
            }

            return found;
        } else {
            return false;
        }
    }
    
    /**
     * * Close the Sidebar.
     * @param {object} [params]
     * @memberof Sidebar
     */
    close (params = {}) {
        this.state.set("open", false);
        this.html.classList.remove("opened");

        if (this.callbacks.has("close")) {
            this.callbacks.execute("close", {
                ...params,
                open: this.state.open,
                Sidebar: this,
            });
        }
    }
    
	/**
     * * Open the Sidebar.
     * @param {object} [params]
     * @memberof Sidebar
     */
    open (params = {}) {
        this.state.set("open", true);
        this.html.classList.add("opened");

        if (this.callbacks.has("open")) {
            this.callbacks.execute("open", {
                ...params,
                open: this.state.open,
                Sidebar: this,
            });
        }
    }

    /**
     * * Switch the Sidebar open state.
     * @returns {boolean}
     * @memberof Sidebar
     */
    switch (open = false, params = {}) {
        if (typeof open != "boolean") return false;

        switch (open) {
            case true:
                this.close();
                break;
                
            case false:
                this.open();
                break;
        }

        if (this.callbacks.has("switch")) {
            this.callbacks.execute("switch", {
                ...params,
                open: open,
                Sidebar: this,
            });
        }

        return open;
    }

    /**
     * @static
     * @var {object} props Default properties.
     */
    static props = {
        id: "sidebar-1",
    }
    
    /**
     * @static
     * @var {object} state Default state.
     */
    static state = {
        current: false,
        open: false,
    }
    
    /**
     * @static
     * @var {object} callbacks Default callbacks.
     */
    static callbacks = {
        // 
    }

    /** 
     * @static
     * @var {Button} Button
     */
    static Button = Button

    /** 
     * @static
     * @var {Link} Link
     */
    static Link = Link
}