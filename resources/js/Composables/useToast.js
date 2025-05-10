import { usePage } from "@inertiajs/vue3";
import { computed, watch } from "vue";
import { toast } from "vue3-toastify";

export function useToast() {
  const page = usePage();
  const flashMessages = computed(() => ({
    errors: page.props.errors,
    messages: page.props.messages,
  }));

  watch(
    flashMessages,
    (value) => {
      if (Object.keys(value.errors).length > 0) {
        // there could be many errors for one field
        for (const errors of Object.values(value.errors)) {
          errors.forEach((error) => toast.error(error));
        }
      }
      if (Object.keys(value.messages).length > 0) {
        for (const message of Object.values(value.messages)) {
          toast.success(message);
        }
      }
    },
    { immediate: true }
  );
}
