<template lang="pug">
.selector.pt-2.pb-1
    .section-title Starting with
    form(@submit.prevent)
        .form-group
            input.form-control(
                name='character',
                placeholder='Starting character of firstname/lastname',
                maxlength='1',
                v-model='character'
            )
</template>

<script>
export default {
    name: 'NameSelector',
    props: ['value'],
    data: function () {
        return {
            character: (this.value && this.value.character) || '',
        };
    },
    watch: {
        character: function (new_value) {
            this.$emit('input', { character: new_value });
        },
    },
};
</script>