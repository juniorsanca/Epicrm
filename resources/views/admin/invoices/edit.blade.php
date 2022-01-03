@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Modifier la facture
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoices.update", $invoice) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

             <div class="form-group">
                <label for="invoice_title">Titre de la facture</label>
                <input class="form-control {{ $errors->has('invoice_title') ? 'is-invalid' : '' }}" type="text" placeholder="Titre de la facture" name="invoice_title" id="invoice_title" value="{{ old('invoice_title', $invoice->invoice_title ) }}" required>
                @if($errors->has('invoice_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_title') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="company">Société</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" placeholder="Société" name="company" id="company" value="{{ old('company', $invoice->company ) }}" required>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="invoice_number">Numero de facture</label>
                <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" type="text" placeholder="Numero de facture" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', $invoice->invoice_number ) }}" required>
                @if($errors->has('invoice_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_number') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="date">Date</label>
                <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" placeholder="Date" name="date" id="date" value="{{ old('date', $invoice->date ) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
            </div>

            <div>
                <br>
                    <h4  class="text-center">Entreprise vendeur </h4>
            </div>
                  <div class="form-group">
                <label for="seller_company">Nom de l'entreprise</label>
                <input class="form-control {{ $errors->has('seller_company') ? 'is-invalid' : '' }}" type="text" placeholder="Entreprise vendeuse" name="seller_company" id="seller_company" value="{{ old('seller_company', $invoice->seller_company ) }}" required>
                @if($errors->has('seller_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seller_company') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="seller_address">Adresse</label>
                <input class="form-control {{ $errors->has('seller_address') ? 'is-invalid' : '' }}" type="text" placeholder="Adresse" name="seller_address" id="seller_address" value="{{ old('seller_address', $invoice->seller_address ) }}" required>
                @if($errors->has('seller_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seller_address') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="seller_email">Email</label>
                <input class="form-control {{ $errors->has('seller_email') ? 'is-invalid' : '' }}" type="text" placeholder="ex : email@gmail.com" name="seller_email" id="seller_email" value="{{ old('seller_email', $invoice->seller_email) }}" required>
                @if($errors->has('seller_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seller_email') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="seller_country">Pays</label>
                <input class="form-control {{ $errors->has('seller_country') ? 'is-invalid' : '' }}" type="text" placeholder="Pays" name="seller_country" id="seller_country" value="{{ old('seller_country', $invoice->seller_country ) }}" required>
                @if($errors->has('seller_country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seller_country') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="seller_contact">Contact</label>
                <input class="form-control {{ $errors->has('seller_contact') ? 'is-invalid' : '' }}" type="text" placeholder="Contact" name="seller_contact" id="seller_contact" value="{{ old('seller_contact', $invoice->seller_contact ) }}" required>
                @if($errors->has('seller_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seller_contact') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="seller_other">Autres</label>
                <input class="form-control {{ $errors->has('seller_other') ? 'is-invalid' : '' }}" type="text" placeholder="Autres..." name="seller_other" id="seller_other" value="{{ old('seller_other', $invoice->seller_other ) }}" required>
                @if($errors->has('seller_other'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seller_other') }}
                    </div>
                @endif
            </div>

               <div>
                <br>
                    <h4  class="text-center"> Acheteur </h4>
            </div>

                  <div class="form-group">
                <label for="buyer_name">Nom de l'acheteur</label>
                <input class="form-control {{ $errors->has('buyer_name') ? 'is-invalid' : '' }}" type="text" placeholder="Nom de l'acheteur" name="buyer_name" id="buyer_name" value="{{ old('buyer_name', $invoice->buyer_name ) }}" required>
                @if($errors->has('buyer_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('buyer_name') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="buyer_company">Nom de l'entreprise</label>
                <input class="form-control {{ $errors->has('buyer_company') ? 'is-invalid' : '' }}" type="text" placeholder="Nom de l'entreprise" name="buyer_company" id="buyer_company" value="{{ old('buyer_company', $invoice->buyer_company ) }}" required>
                @if($errors->has('buyer_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('buyer_company') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="buyer_address">Adresse</label>
                <input class="form-control {{ $errors->has('buyer_address') ? 'is-invalid' : '' }}" type="text" placeholder="Adresse" name="buyer_address" id="buyer_address" value="{{ old('buyer_address', $invoice->buyer_address ) }}" required>
                @if($errors->has('buyer_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('buyer_address') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="buyer_email">Email</label>
                <input class="form-control {{ $errors->has('buyer_email') ? 'is-invalid' : '' }}" type="text" placeholder="Email" name="buyer_email" id="buyer_email" value="{{ old('buyer_email', $invoice->buyer_email ) }}" required>
                @if($errors->has('buyer_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('buyer_email') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="buyer_contact">Contact</label>
                <input class="form-control {{ $errors->has('buyer_contact') ? 'is-invalid' : '' }}" type="text" placeholder="Contact" name="buyer_contact" id="buyer_contact" value="{{ old('buyer_contact', $invoice->buyer_contact ) }}" required>
                @if($errors->has('buyer_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('buyer_contact') }}
                    </div>
                @endif
            </div>

               <div>
                <br>
                    <h4  class="text-center">Produit </h4>
            </div>

                  <div class="form-group">
                <label for="product_description">Description</label>
                <input class="form-control {{ $errors->has('product_description') ? 'is-invalid' : '' }}" type="text" placeholder="Description" name="product_description" id="product_description" value="{{ old('product_description', $invoice->product_description ) }}" required>
                @if($errors->has('product_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_description') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="product_quantity">Quantité</label>
                <input class="form-control {{ $errors->has('product_quantity') ? 'is-invalid' : '' }}" type="text" placeholder="Quantité" name="product_quantity" id="product_quantity" value="{{ old('product_quantity', $invoice->product_quantity ) }}" required>
                @if($errors->has('product_quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_quantity') }}
                    </div>
                @endif
            </div>

                  <div class="form-group">
                <label for="product_price">Prix</label>
                <input class="form-control {{ $errors->has('product_price') ? 'is-invalid' : '' }}" type="text" placeholder="Prix" name="product_price" id="product_price" value="{{ old('product_price', $invoice->product_price ) }}" required>
                @if($errors->has('product_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_price') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="product_sub_total">Sub Total</label>
                <input class="form-control {{ $errors->has('product_sub_total') ? 'is-invalid' : '' }}" type="text" placeholder="Sub total" name="product_sub_total" id="product_sub_total" value="{{ old('product_sub_total', $invoice->product_sub_total ) }}" required>
                @if($errors->has('product_sub_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_sub_total') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="product_tva">% TVA</label>
                <input class="form-control {{ $errors->has('product_tva') ? 'is-invalid' : '' }}" type="text" placeholder="% TVA" name="product_tva" id="product_tva" value="{{ old('product_tva', $invoice->product_tva ) }}" required>
                @if($errors->has('product_tva'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_tva') }}
                    </div>
                @endif
            </div>
                  <div class="form-group">
                <label for="product_total">Total</label>
                <input class="form-control {{ $errors->has('product_total') ? 'is-invalid' : '' }}" type="text" placeholder="Total" name="product_total" id="product_total" value="{{ old('product_total', $invoice->product_total ) }}" required>
                @if($errors->has('product_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_total') }}
                    </div>
                @endif
            </div>

               <div>
                <br>
                    <h4  class="text-center"> Condition </h4>
            </div>
                  <div class="form-group">
                <label for="condition_payment_mode">Mode de payement</label>
                <input class="form-control {{ $errors->has('condition_payment_mode') ? 'is-invalid' : '' }}" type="text" placeholder="Mode de payement" name="condition_payment_mode" id="condition_payment_mode" value="{{ old('condition_payment_mode', $invoice->condition_payment_mode ) }}" required>
                @if($errors->has('condition_payment_mode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('condition_payment_mode') }}
                    </div>
                @endif
            </div>

                  <div class="form-group">
                <label for="condition_pay_until_date">Date écheance</label>
                <input class="form-control {{ $errors->has('condition_pay_until_date') ? 'is-invalid' : '' }}" type="text" placeholder="Date d'écheance" name="condition_pay_until_date" id="condition_pay_until_date" value="{{ old('condition_pay_until_date', $invoice->condition_pay_until_date) }}" required>
                @if($errors->has('condition_pay_until_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('condition_pay_until_date') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Mettre à jour la facture
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
