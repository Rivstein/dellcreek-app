/**
 * Module : Installments Calculator
 * ===============================================
 *  Calculates the monthly installments to be paid
 * ===============================================
 *  Formula : 
 *  (P ( 1 + Interest Rate(%) - Deposite(%))) 
 *      / Number of months
 * ===============================================
 * NOTE : principle is passed from blade
 */

(function(){

    const p = principle
    const min_d = p*0.1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
    const r = 0.07

    console.log(p)

    let $deposite = $('#calc-deposite')
    let $months = $('#calc-months')                                                                                                    

    let $depoResult = $('#result-deposite')
    let $installmentsResult = $('#result-installments')
    let $periodResult = $('#result-period')
    let $totalResult = $('#result-total')

    // bindEvents
    function bindEvents(){
        $deposite.focusout(compute)
        $deposite.keyup(function(){
            setTimeout(function(){
                compute()
            },500)
        })
        $months.on('change',compute)
    }

    //compute results
    function compute(){
        let user_d = parseInt($deposite.val())
        let user_m = parseInt($months.val())


        if (user_d >= min_d){

            $depoResult.html('Ksh '+ parseInt( user_d ).toLocaleString())

            if(user_m > 0 && user_m < 13 ){
                let mi = ( p*( 1 + r ) - user_d )/user_m
                let total = user_d + ( mi*user_m )

                $installmentsResult.html('Ksh ' + mi.toLocaleString())
                $periodResult.html(user_m+' months')
                $totalResult.html('Ksh '+ total.toLocaleString())
            }
        }
        else{
            $depoResult.html(`<span class="text-red-600">
                                # Ksh ${min_d} is the minimum deposit amount
                            </span>`)
        }
    }

    function reset(){
        $deposite.val(min_d)
        $months.val('')
        $depoResult.html('')
        $installmentsResult.html('')
        $periodResult.html('')
        $totalResult.html('')
    }

    bindEvents()
})()