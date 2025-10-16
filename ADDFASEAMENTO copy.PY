import openpyxl as px
import sqlite3 
import datetime
import tqdm

hoje=datetime.datetime.now()

dia=hoje.day
mes=hoje.month
ano=hoje.year


base=px.load_workbook(r"C:\Users\denis\OneDrive\Área de Trabalho\Faseamento 2023 - macro.xlsm")

con=sqlite3.connect(r"C:\xampp\htdocs\dbfaseamento.db")

cursor=con.cursor()

#cursor.execute("CREATE TABLE DEVOLUCAO (DOCUMENTO INT,PRODUTO INT, DESCRICAO TEXT,QUANTIDADE FLOAT,UNIDADE TEXT,VLR_UNITARIO FLOAT,ALIQ_IPI FLOAT,VLR_TOTAL FLOAT,ALIQ_ICMD FLOAT,FORN_CLIENTE INT,NOME TEXT,TIPO_DOCT TEXT,TIPO_ENTRADA INT,TIPO_PRODUTO TEXT,GRUPO TEXT,DT_DIGITACAO DATA,CUSTO_MOEDA1 FLOAT,DOCTO_ORIG INT,SERIE_ORIG INT)")
#cursor.execute("DROP TABLE CARTEIRA")
#cursor.execute("CREATE TABLE CARTEIRA ()")
#cursor.execute("ALTER TABLE FATURAMENTO ADD DATA_FASEAMENTO DATA")
#con.commit()

tabela1=base['FATURAMENTO(RELATORIO_DE_VENDA']
tabela2=base['CARTEIRA(ITENS_DO_PEDIDO']
tabela3=base['DEVOLUCAO(NOTAS_DE_DEVOLUCAO']

#cursor.execute("ALTER TABLE CARTEIRA ADD DATA_FASEAMENTO DATA")
#cursor.execute("alter table CARTEIRA DROP COLUMN DATA_FASEAMENTO")
#con.commit()

totaldevolucao=tabela3.max_row-2
totalcarteira=tabela2.max_row-2
totalfaturamento=tabela1.max_row-2

t=f'{dia}/{mes}/{ano}'

validacao=str(input("Data Automatica?[S/N]"))
if validacao=="s" or validacao=="S":
    t=f'{dia}/{mes}/{ano}'
    print("Data hoje: ",t)
else:  
    t=str(input("Data Faseamento:"))
print("-"*35)



#FATURAMENTO
def faturamento():
    with tqdm.tqdm(total=totalfaturamento,desc="Importando Faturamento",colour="green",mininterval=0.01) as barra:
        for c1 in tabela1.iter_rows(min_row=3):
            vasio1=g1=c1[0].value
            if vasio1 == None:
                break
            g1=c1[0].value
            g2=c1[1].value
            g3=c1[2].value
            g4=c1[3].value
            g5=c1[4].value
            g6=c1[5].value
            g7=c1[6].value
            g8=c1[7].value
            g9=c1[8].value
            g10=c1[9].value
            g11=c1[10].value
            g12=c1[11].value
            g13=c1[12].value
            g14=c1[13].value
            g15=c1[14].value
            g16=c1[15].value
            g17=c1[16].value
            g18=c1[17].value
            g19=c1[18].value
            g20=c1[19].value
            #cursor.execute(f"INSERT INTO FATURAMENTO VALUES({g1},{g2},'{g3}',{g4},'{g5}',{g6},'{g7}',{g8},{g9},'{g10}','{g11}','{g12}','{g13}','{g14}','{g15}','{g16}',{g17},{g18},'{t}')")
            cursor.execute("""INSERT INTO FATURAMENTO VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)""",(g1,g2,g3,g4,g5,g6,g7,g8,g9,g10,g11,g12,g13,g14,g15,g16,g17,g18,g19,g20,t))
            con.commit()
            barra.update() 
        #print(g1,g2,g3,g4,g5,g6,g7,g8,g9,g10,g11,g12,g13,g14,g15,g16,g17,g18,g19,g20,t)
    print("FATURAMENRO ADICIONADO COM SUCESSO!")
    print("-"*35)  

#CARTEIRA
def carteira():
    with tqdm.tqdm(total=totalcarteira,desc="Importando Carteira",colour="green",mininterval=0.01) as barra:
        for t1 in tabela2.iter_rows(min_row=3):
            vasio2 =r1=t1[0].value
            if vasio2 ==None:
                break
            r1=t1[0].value
            r2=t1[1].value
            r3=t1[2].value
            try: 
                r4=t1[3].value[10:]
            except TypeError:
                r4=t1[3].value
            r5=t1[4].value
            r6=t1[5].value
            r7=t1[6].value
            r8=t1[7].value
            r9=t1[8].value
            r10=t1[9].value
            r11=t1[10].value
            r12=t1[11].value
            r13=t1[12].value
            r14=t1[13].value
            r15=t1[14].value
            r16=t1[15].value
            r17=t1[16].value
            r18=t1[17].value
            r19=t1[18].value
            r20=t1[19].value
            r21=t1[20].value
            r22=t1[21].value
            r23=t1[22].value
            r24=t1[23].value
            r25=t1[24].value
            r26=t1[25].value
            #cursor.execute(f"INSERT INTO CARTEIRA VALUES({r1},{cortar},'{r3}','{r4}','{r5}',{r6},{r7},{r8},{r9},{r10},'{r11}',{r12},{r13},{r14},{r15},{r16},{r17},{r18},{r19},'{r20}',{r21},{r22},'{r23}')")
            cursor.execute("""INSERT INTO CARTEIRA VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)""",(r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12,r13,r14,r15,r16,r17,r18,r19,r20,r21,r22,r23,r24,r25,r26,t))
            con.commit()
            #print(r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12,r13,r14,r15,r16,r17,r18,r19,r20,r21,r22,r23,t)
            barra.update()   
    print("CARTEIRA ADICIONADO COM SUCESSO!!")
    print("-"*35)  

#DEVOLUCAO
def devolucao():
    with tqdm.tqdm(total=totaldevolucao,desc="Importando Devolução",colour="green",mininterval=0.01) as barra:
        for v1 in tabela3.iter_rows(min_row=3):
            vasio3=h1=v1[0].value
            if vasio3==None:
                break
            h1=v1[0].value
            h2=v1[1].value
            h3=v1[2].value
            h4=v1[3].value
            h5=v1[4].value
            h6=v1[5].value
            h7=v1[6].value
            h8=v1[7].value
            h9=v1[8].value
            h10=v1[9].value
            h11=v1[10].value
            h12=v1[11].value
            h13=v1[12].value
            h14=v1[13].value
            h15=v1[14].value
            h16=v1[15].value
            h17=v1[16].value
            h18=v1[17].value
            h19=v1[18].value
            h20=v1[19].value
            h21=v1[20].value
            h22=v1[21].value
            h23=v1[22].value
            h24=v1[23].value
            h25=v1[24].value
            
            
            #cursor.execute("INSERT INTO DEVOLUCAO VALUES({h1},{h2},'{h3}',{h4},'{h5}',{h6},{h7},{h8},{h9},{h10},'{h11}','{h12}',{h13},'{h14}','{h15}','{h16}','{h17}',{h18},{h19},'{t}'))
            #cursor.execute("""INSERT INTO DEVOLUCAO VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)""",(h1,h2,h3,h4,h5,h6,h7,h8,h9,h10,h11,h12,h13,h14,h16,h17,h18,h19,h20,h21,h22,t,h23,h24))
            cursor.execute("""INSERT INTO DEVOLUCAO VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)""",(h1,h2,h3,h4,h5,h6,h7,h8,h9,h10,h11,h12,h13,h14,h15,h16,h17,h18,h19,h20,h21,h22,h23,h24,h25,t))

            con.commit()
            
            #print(h1,h2,h3,h4,h5,h6,h7,h8,h9,h10,h11,h12,h13,h14,h16,h17,h18,h19,h20,h21,h22,t,h23,h24,h25,h15)
            #print(h1,h2,h3,h4,h5,h6,h7,h8,h9,h10,h11,h12,h13,h14,h16,h17,h18,h19)
            #print(h20)
            barra.update()
    print("DEVOLUCAO ADICIONADO COM SUCESSO!!!")
    print("-"*35)  

escolha=str(input("ADICIONAR OS 3 RELATPORIOS?[S/N]"))
if escolha =="s" or escolha=="S":
    faturamento()
    devolucao()
    carteira()
else:
    print("1 - FATURAMENTO")
    print("2 - CARTEIRA")
    print("3 - DEVOLUCAO")
    x=int(input("QUAL RELATORIO ADICIONAR:"))
    if x==1:
        faturamento()
    elif x==2:
        carteira()
    elif x==3:
        devolucao()





