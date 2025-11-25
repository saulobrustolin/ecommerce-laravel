<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            CREATE OR REPLACE FUNCTION criarPedido(vuser INT, vaddress INT)
            RETURNS INT AS $$
            DECLARE
                v_order_id INT;
                cart_record RECORD;
                v_total DECIMAL(8, 2) := 0;
            BEGIN
                -- valida se o usuário possui itens no carrinho
                PERFORM 1 FROM carts WHERE user_id = vuser LIMIT 1;
                IF NOT FOUND THEN
                    RAISE EXCEPTION 'Carrinho vazio. Pedido não pode ser criado.'
                        USING ERRCODE = '27000';
                END IF;

                SELECT SUM(c.quantity * p.price)
                INTO v_total
                FROM carts c
                JOIN products p ON c.product_id = p.id
                WHERE c.user_id = vuser;

                -- cria o pedido
                INSERT INTO orders (
                    user_id,
                    shipping_cost,
                    discount_amount,
                    order_code,
                    payment_method,
                    id_transition,
                    shipping_method,
                    status,
                    address_id,
                    total_price
                ) VALUES (
                    vuser,
                    0,
                    0,
                    substring(gen_random_uuid()::text, 1, 10),
                    'PIX',
                    substring(gen_random_uuid()::text, 1, 30),
                    'SEDEX',
                    'Aguardando pagamento',
                    vaddress,
                    v_total
                )
                RETURNING id INTO v_order_id;

                -- copia os itens do carrinho
                FOR cart_record IN
                    SELECT 
                        c.quantity,
                        c.size_id,
                        c.color_id,
                        c.product_id,
                        p.price
                    FROM carts c
                    JOIN products p ON c.product_id = p.id
                    WHERE c.user_id = vuser
                LOOP
                    INSERT INTO order_product (
                        price_unit,
                        quantity,
                        subtotal,
                        product_id,
                        order_id,
                        size_id,
                        color_id
                    ) VALUES (
                        cart_record.price,
                        cart_record.quantity,
                        cart_record.price * cart_record.quantity,
                        cart_record.product_id,
                        v_order_id,
                        cart_record.size_id,
                        cart_record.color_id
                    );
                END LOOP;

                -- limpa carrinho
                DELETE FROM carts WHERE user_id = vuser;

                RETURN v_order_id;
            END;
            $$ LANGUAGE plpgsql;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP FUNCTION IF EXISTS criarPedido(integer, integer);");
    }
};
