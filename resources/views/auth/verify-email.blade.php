@extends('layouts.default')
@section('title','Rese メール認証を完了してください')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/verify-email.css') }}">
@endsection


@section('main')
<main class="thanks">
    <div class="box">
        <p class="box__message">会員登録ありがとうございます。</p>
        <p class="box__message__detail">本登録用のメールは届きましたか？<br>届いていないようでしたら、下記ボタンをクリックして、<br>再度メールをご確認ください。</p>
        <div class="box__button">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-button class="box__button__mail">
                    {{ __('認証メール再送付') }}
                </x-button>
            </form>
        </div>
    </div>
</main>

@endsection