<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateInfoForm from '@/Sections/Edit/UpdateInfoForm.vue';
import UpdateSkillsForm from '@/Sections/Edit/UpdateStacksForm.vue';
import UpdateCertificationsForm from '@/Sections/Edit/UpdateCertificationsForm.vue';
import UpdateExperienceForm from '@/Sections/Edit/UpdateExperienceForm.vue';
import UpdateProjectForm from '@/Sections/Edit/UpdateProjectForm.vue';
import UpdateSocialsForm from '@/Sections/Edit/UpdateSocialsForm.vue';


defineProps({
   
});
</script>

<template>
    <AppLayout title="Site Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Page Settings
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
                    <UpdateInfoForm :user="$page.props.auth.user" :info="$page.props.info" />
                    <SectionBorder />
                </div>

                <div>
                    <UpdateSkillsForm :skills="$page.props.skills" />
                    <!-- <UpdatePasswordForm class="mt-10 sm:mt-0" /> -->

                    <SectionBorder />
                </div>

                <div>
                    <UpdateCertificationsForm :certifications="$page.props.certifications" />
                    <SectionBorder />
                </div>

                <div >
                    <UpdateProjectForm :projects="$page.props.projects" />
                    <SectionBorder />
                </div>

                <div >
                    <UpdateSocialsForm :socials="$page.props.social" />
                    <SectionBorder />
                </div>

                <div >
                    <UpdateExperienceForm :experience="$page.props.experience" />
                    <SectionBorder />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
