<template lang="pug">
.selector.pt-2.pb-1
    .section-title Choose location
    form(@submit.prevent)
        .form-group
            select.form-control(v-model='location')
                option(selected, value, disabled) Choose location
                option(
                    v-for='(location, index) in locations',
                    :key='index',
                    :value='location',
                    v-text='location'
                )
        .form-group.slider-container(v-if='location')
            input.slider(type='range', min='10', max='2000', v-model='radius')
            .small(v-text='radiusText')
</template>

<script>
export default {
    name: 'LocationSelector',
    props: ['value', 'locations'],
    data: function () {
        return {
            location: (this.value && this.value.location) || '',
            radius: (this.value && this.value.radius) || 200,
        };
    },
    watch: {
        location: function (new_value) {
            this.$emit('input', { location: new_value, radius: this.radius });
        },
        radius: function (new_value) {
            this.$emit('input', { location: this.location, radius: new_value });
        },
    },
    computed: {
        radiusText: function () {
            return `Within ${this.radius}km radius`;
        },
    },
};
</script>