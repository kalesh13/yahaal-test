<template lang="pug">
.filters-container
    .title.px-1
        span.fas.fa-filter
        | Filter
    .filters
        .section-title Filter by
        form(@submit.prevent)
            .form-group.d-flex.align-items-center
                input(type='radio', name='filter_by', value='gender', v-model='filter_by')
                span Gender
            .form-group.d-flex.align-items-center
                input(type='radio', name='filter_by', value='name', v-model='filter_by')
                span Name
            .form-group.d-flex.align-items-center
                input(type='radio', name='filter_by', value='location', v-model='filter_by')
                span Location
        gender-selector(v-if='filter_by === "gender"', v-model='conditions')
        name-selector(v-if='filter_by === "name"', v-model='conditions')
        location-selector(
            v-if='filter_by === "location"',
            v-model='conditions',
            :locations='["London", "Paris", "Kansas City"]'
        )
        ul.errors(v-if='filter_by !== "" && errors')
            li(v-if='errors.server_error', v-text='errors.server_error')
            template(v-else)
                li(v-for='(value, key) in errors', :key='key', v-text='value[0]')
        button.theme-btn.mb-1(v-if='filter_by !== ""', @click='submit', :disabled='submitted')
            span.fas.fa-circle-notch.fa-spin(v-if='submitted')
            | Apply filter
</template>

<script>
import NameSelector from '@components/filters/nameSelector';
import GenderSelector from '@components/filters/genderSelector';
import LocationSelector from '@components/filters/locationSelector';

export default {
    name: 'Filters',
    props: ['submitted', 'errors'],
    data: function () {
        return {
            filter_by: '',
            conditions: '',
        };
    },
    methods: {
        submit: function () {
            this.$emit('onSubmit', { ...this.conditions, filter_by: this.filter_by });
        },
    },
    components: { GenderSelector, NameSelector, LocationSelector },
};
</script>