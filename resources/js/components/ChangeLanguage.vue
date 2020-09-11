<template>
    <div class="lang">
        <select name="language" class="form-select" @change="changeLanguage" v-model="language">
            <option value="en">English</option>
            <option value="vi">Tiếng Việt</option>
        </select>
    </div>
</template>
<script>
export default {
    data() {
        return {
            language: this.$i18n.locale
        };
    },
    methods: {
        changeLanguage() {
            localStorage.setItem('language', this.language);
            this.$i18n.locale = this.language;
            fetch(`api/language/${this.language}`);
        }
    }
};
</script>