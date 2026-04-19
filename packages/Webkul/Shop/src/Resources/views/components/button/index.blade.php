<v-button {{ $attributes }}></v-button>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-button-template"
    >
        {{-- Estado normal --}}
        <button
            v-if="! loading"
            :class="[buttonClass]"
            style="
                position: relative;
                overflow: hidden;
                transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            "
        >
            {{-- Shine effect en hover --}}
            <span style="
                position: absolute; inset: 0;
                background: linear-gradient(105deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%);
                transform: translateX(-100%);
                transition: transform 0.5s ease;
                pointer-events: none;
            " class="kv-btn-shine"></span>

            @{{ title }}
        </button>

        {{-- Estado loading --}}
        <button
            v-else
            :class="[buttonClass]"
            disabled
            style="
                position: relative;
                overflow: hidden;
                opacity: 0.75;
                cursor: not-allowed;
            "
        >
            {{-- Spinner KillaVibe --}}
            <svg
                style="
                    position: absolute;
                    left: 50%; top: 50%;
                    transform: translate(-50%, -50%);
                    width: 1.1rem; height: 1.1rem;
                "
                class="animate-spin"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                aria-hidden="true"
                viewBox="0 0 24 24"
            >
                <circle
                    cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="3"
                    style="opacity: 0.25;"
                ></circle>
                <path
                    fill="currentColor"
                    style="opacity: 0.85;"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                ></path>
            </svg>

            <span style="visibility: hidden;">
                @{{ title }}
            </span>
        </button>
    </script>

    <style>
        /* KillaVibe Button — shine on hover */
        button:hover .kv-btn-shine {
            transform: translateX(100%) !important;
        }

        /* Primary button KillaVibe override */
        .primary-button {
            background: linear-gradient(135deg, #6366f1, #22d3ee) !important;
            border: none !important;
            border-radius: 0.75rem !important;
            font-weight: 700 !important;
            letter-spacing: 0.02em !important;
            box-shadow: 0 4px 16px rgba(99, 102, 241, 0.35) !important;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }
        .primary-button:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.45) !important;
        }
        .primary-button:active {
            transform: translateY(0) !important;
        }

        /* Secondary button KillaVibe override */
        .secondary-button {
            background: transparent !important;
            border: 1.5px solid rgba(99, 102, 241, 0.30) !important;
            border-radius: 0.75rem !important;
            color: #6366f1 !important;
            font-weight: 600 !important;
            transition: all 0.2s ease !important;
        }
        .secondary-button:hover {
            background: rgba(99, 102, 241, 0.06) !important;
            border-color: rgba(99, 102, 241, 0.55) !important;
        }
    </style>

    <script type="module">
        app.component('v-button', {
            template: '#v-button-template',
            props: {
                loading: Boolean,
                buttonType: String,
                title: String,
                buttonClass: String,
            },
        });
    </script>
@endPushOnce
