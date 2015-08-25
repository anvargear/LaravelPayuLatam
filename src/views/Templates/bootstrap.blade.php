<form method="post" action="{{$url}}">
    @include('payulatam::templates.partials.hiddenfields')
    <button type="submit" class="btn btn-primary">
        {{trans('payulatam::payulatam.buyButton')}}
    </button>
</form>