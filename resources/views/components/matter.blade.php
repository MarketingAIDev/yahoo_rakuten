<div class="m-3">
    <div class="row my-4 mb-0 mx-2">
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
            <div class="card shadow-lg mt-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <a class="d-block blur-shadow-image">
                        <img class="border-radius-md" src="{{ !empty($recruitment['image']) ? asset('uploads/recruitments/'.$recruitment['image']) : asset('assets/img/utils/empty.png') }}" style="width: 100%">
                    </a>
                </div>
                <div class="card-body">
                    <h4>{{ $recruitment['title'] }}</h4>
                    <p class="text-bold">
                        {{ $recruitment['family_name'] }}
                    </p>
                    <input value="{{ $recruitment['recruitment_review'] }}" type="text" class="rating" readonly data-size="xs">
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="row">
                <div class="col-12 p-1">
                    <h6>{{__('messages.recruitment.description')}}</h6>
                    <p class="m-0"> {{ $recruitment['description'] }} </p>
                </div>
                <div class="col-12 p-1">
                    <h6>{{ __('messages.recruitment.notice') }}</h6>
                    <p class="m-0"> {{ $recruitment['notice'] }} </p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="p-3 text-start">
                        <i class="material-icons text-4xl text-gradient text-info">location_on</i>
                        <h5 class="mt-3">{{ __('messages.recruitment.workplace') }}</h5>
                        <p>{{ $recruitment['workplace'] }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="p-3 text-start">
                        <i class="material-icons text-4xl text-gradient text-info">calendar_month</i>
                        <h5 class="mt-3">{{ __('messages.recruitment.work_date') }}</h5>
                        <p>
                            {{ format_date($recruitment['work_date_start']) }}
                            @if($recruitment['work_date_start'] != $recruitment['work_date_end'])
                                ~ {{ format_date($recruitment['work_date_end']) }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="p-3 text-start">
                        <i class="material-icons text-4xl text-gradient text-info">alarm_on</i>
                        <h5 class="mt-3">{{ __('messages.recruitment.work_time') }}</h5>
                        <p>{{ format_time($recruitment['work_time_start']) }} ~ {{ format_time($recruitment['work_time_end']) }}</p>
                    </div>
                </div>
            </div>
            <div class="row px-3">
                <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                    <h6>{{ __('messages.recruitment.pay_mode.title') }}</h6>
                    <p class="m-0">
                        {{__('messages.recruitment.pay_mode.'.$recruitment['pay_mode'])}}
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                    <h6>{{ __('messages.recruitment.reward.title') }}</h6>
                    <p class="m-0">
                        {{ $recruitment['reward_type'] }}({{ $recruitment['reward_cost'] }}円)
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                    <h6>{{ __('messages.recruitment.worker_amount') }}</h6>
                    <p class="m-0">
                        {{ $recruitment['worker_amount'] }}名
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                    <h6>{{ __('messages.recruitment.traffic.title') }}</h6>
                    <p class="m-0">
                        {{ $recruitment['traffic_type'] == 'include' ? __('messages.recruitment.traffic.include') : $recruitment['traffic_cost'].'円'}}
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                    <h6>{{ __('messages.recruitment.lunch_mode.title') }}</h6>
                    <p class="m-0">
                        {{ $recruitment['lunch_mode'] ? __('messages.recruitment.lunch_mode.yes') : __('messages.recruitment.lunch_mode.no') }}
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                    <h6>{{ __('messages.recruitment.toilet.title') }}</h6>
                    <p class="m-0">
                        {{$recruitment['toilet']?__('messages.recruitment.toilet.yes'):__('messages.recruitment.toilet.no')}}
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                    <h6>{{__('messages.recruitment.insurance.title')}}</h6>
                    <p class="m-0">
                        {{$recruitment['insurance']?__('messages.recruitment.insurance.yes'):__('messages.recruitment.insurance.no')}}
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                    <h6>{{__('messages.recruitment.park.title')}}</h6>
                    <p class="m-0">
                        {{$recruitment['park']?__('messages.recruitment.park.yes'):__('messages.recruitment.park.no')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
{{--        <h3 class="row justify-content-end text-right"> {{__('messages.recruitment.add_on')}} </h3>--}}
        @foreach($recruitment['postscript'] as $postscript)
            <div class="row justify-content-end text-right m-4">
                <div class="col-auto">
                    <div class="card bg-gradient-info text-white">
                        <div class="card-body p-2">
                            <pre class="mb-1">{{ $postscript['content'] }}<br></pre>
                            <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                <i class="material-icons text-sm me-1">schedule</i>
                                <small>
                                    {{ format_date($postscript['time']) }}
                                    {{ format_time($postscript['time'], true) }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
