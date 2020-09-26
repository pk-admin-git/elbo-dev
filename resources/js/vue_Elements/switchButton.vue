<template>
    <label for="toggle_button">
        <span v-if="isActive" class="toggle_label">On</span>
        <span v-if="! isActive" class="toggle_label">Off</span>

        <input type="checkbox" id="toggle_button" v-model="checkedValue">
        <span class="toggle_switch"></span>
    </label>
</template>

<script>
export default {
    name: 'ToggleButton',
    data() {
        return {
            currentState: false
        }
    },
    computed: {
    isActive() {
        return this.currentState;
    },

    checkedValue: {
        get() {
            return this.currentState
        },
        set(newValue) {
            this.currentState = newValue;
        }
    }
}
}
</script>

<style>
.toggle_button {
    vertical-align: middle;
    user-select: none;
    cursor: pointer;
}
.toggle_button input[type="checkbox"] {
    opacity: 0;
    position: absolute;
    width: 1px;
    height: 1px;
}
.toggle_button .toggle_switch {
    display:inline-block;
    height:12px;
    border-radius:6px;
    width:40px;
    background: #BFCBD9;
    box-shadow: inset 0 0 1px #BFCBD9;
    position:relative;
    margin-left: 10px;
    transition: all .25s;
}

.toggle_button .toggle_switch::after, 
.toggle_button .toggle_switch::before {
    content: "";
    position: absolute;
    display: block;
    height: 18px;
    width: 18px;
    border-radius: 50%;
    left: 0;
    top: -3px;
    transform: translateX(0);
    transition: all .25s cubic-bezier(.5, -.6, .5, 1.6);
}

.toggle_button .toggle_switch::after {
    background: #4D4D4D;
    box-shadow: 0 0 1px #666;
}
.toggle_button .toggle_switch::before {
    background: #4D4D4D;
    box-shadow: 0 0 0 3px rgba(0,0,0,0.1);
    opacity:0;
}
</style>