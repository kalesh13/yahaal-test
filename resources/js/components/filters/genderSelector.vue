<template lang="pug">
.selector.pt-2.pb-1
    .section-title Choose gender
    form(@submit.prevent)
        .form-group.d-flex.align-items-center
            input(type='radio', name='gender', value='Male', v-model='gender')
            span Male
        .form-group.d-flex.align-items-center
            input(type='radio', name='gender', value='Female', v-model='gender')
            span Female
</template>

<script>
export default {
    name: 'GenderSelector',
    props: ['value'],
    data: function () {
        return {
            gender: (this.value && this.value.gender) || '',
        };
    },
    watch: {
        gender: function (new_value) {
            this.$emit('input', { gender: new_value });
        },
    },
};
</script>