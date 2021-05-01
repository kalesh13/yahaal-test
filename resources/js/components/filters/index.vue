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
        ul.errors(v-if='filter_by !== "" && df.errors')
            li(v-if='df.errors.server_error', v-text='df.errors.server_error')
            template(v-else)
                li(v-for='(value, key) in df.errors', :key='key', v-text='value[0]')
        .d-flex.align-items-center.mb-1
            a.reset(v-if='filtered_result', href='#', @click.prevent='clearFilter') Reset filter
            button.theme-btn(v-if='filter_by !== ""', @click='submit', :disabled='df.fetching')
                span.fas.fa-circle-notch.fa-spin(v-if='df.fetching')
                | Apply filter
</template>

<script>
import DataFetcher from '@rheas/vuer/classes/DataFetcher';
import NameSelector from '@components/filters/nameSelector';
import GenderSelector from '@components/filters/genderSelector';
import LocationSelector from '@components/filters/locationSelector';

export default {
    name: 'Filters',
    data: function () {
        return {
            filter_by: '',
            conditions: '',
            filtered_result: false,
            df: new DataFetcher(),
        };
    },
    watch: {
        filter_by: function () {
            this.df.errors = {};
        },
    },
    methods: {
        submit: function () {
            let filters = { ...this.conditions, filter_by: this.filter_by };
            let url = '/api/users?' + this.getQuery(filters);

            this.df.fetchData(url, this.onSuccess);
        },
        onSuccess: function (data) {
            this.filtered_result = true;

            this.$emit('filteredUsers', data);
        },
        getQuery: function (params) {
            let query = [];

            for (let key in params) {
                if (params.hasOwnProperty(key) && null !== params[key]) {
                    query.push(encodeURIComponent(key) + '=' + encodeURIComponent(params[key]));
                }
            }
            return query.join('&');
        },
        clearFilter: function () {
            this.filter_by = '';
            this.conditions = '';
            this.filtered_result = false;

            this.$emit('onReset');
        },
    },
    components: { GenderSelector, NameSelector, LocationSelector },
};
</script>