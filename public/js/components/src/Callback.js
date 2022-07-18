/**
 * * Controls the Callback methods.
 * @export
 * @author JuanCruzAGB <juan.cruz.armentia@gmail.com>
 */
export default {
    /**
     * * Executes a Class callback.
     * @param {string} name
     * @param {object} [params={}]
     * @throws {Error}
     */
    execute (name, params = {}) {
        if (!name) throw new Error('Callback name is required');

        if (!name instanceof String) throw new Error('Callback name must be a string');

        if (!this.has(name)) throw new Error('Callback does not exist');

        this[name].execute({
            ...params,
        });
    },

    /**
     * * Check if there is a Callback.
     * @param {array|string} name
     * @throws {Error}
     * @returns {boolean}
     */
    has (name) {
        if (name == undefined) throw new Error('Callback name is required');

        if (Array.isArray(name)) {
            for (const callback of name) {
                if (!this.has(callback)) return false;
            }

            return true;
        }

        if (!name instanceof String) throw new Error('Callback name must be a string');

        return this.hasOwnProperty(name);
    },

    /**
     * * Remove a Callback.
     * @param {string} name
     * @throws {Error}
     */
    remove (name) {
        if (name == undefined) throw new Error('Callback name is required');

        if (Array.isArray(name)) {
            for (const callback of name) {
                this.remove(callback);
            }

            return;
        }

        if (!name instanceof String) throw new Error('Callback name must be a string');

        if (this.has(name)) throw new Error('Callback does not exist');

        delete this[name];
    },

    /**
     * * Set a Callback.
     * @param {array|object|string} name
     * @param {object} [value=null]
     * @param {function} [value.function]
     * @param {object} [value.params]
     * @throws {Error}
     * @returns
     */
    set (name, value = null) {
        if (!name) throw new Error('Callback name is required');

        if (Array.isArray(name)) {
            for (const callback of name) {
                if (!callback instanceof String) {
                    if (!this.set(...callback)) return false;
                } else {
                    if (!this.set(callback)) return false;
                }
            }

            return;
        } else if (name instanceof Object) {
            for (const callbackName in name) {
                if (Object.hasOwnProperty.call(name, callbackName)) this.set(callbackName, name[callbackName]);
            }

            return;
        }

        this[name] = {
            ...value,
            /**
             * * Executes the callback.
             * @param {object} [params={}]
             */
            execute (params = {}) {
                this.function({
                    ...this.params,
                    ...params,
                });
            }
        };
    },
}