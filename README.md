# Planner AI 2026

Um sistema de planejamento inteligente com interface Kanban, integração com IA e sistema de metas. Projeto desenvolvido para o Laravel Lab 2026.

## 🚀 Sobre o Projeto

O **Planner AI 2026** é uma aplicação moderna de gerenciamento de tarefas e metas que utiliza inteligência artificial para auxiliar no planejamento e organização de projetos. Desenvolvido com as mais recentes tecnologias do ecossistema Laravel, o projeto combina uma interface intuitiva com recursos avançados de IA.

### Características Principais

- 🎯 **Sistema de Metas**: Defina e acompanhe seus objetivos de forma estruturada
- 📋 **Interface Kanban**: Organize suas tarefas visualmente com drag-and-drop
- 🤖 **Integração com IA**: Suporte para OpenAI e Google Gemini para assistência inteligente
- 🔍 **RAG (Retrieval-Augmented Generation)**: Busca semântica com pgvector para contexto aprimorado
- 🎨 **Design System Completo**: Interface moderna e responsiva com suporte a dark mode
- ☁️ **Deploy AWS**: Preparado para implantação em ambiente de produção

## 🎓 Laravel Lab 2026

Este projeto foi desenvolvido durante o **Laravel Lab**, evento realizado nos dias **24 e 25 de janeiro de 2026**, focado em desenvolvimento AI-first com Laravel. O evento explora as melhores práticas para integração de inteligência artificial em aplicações modernas, utilizando as últimas versões do framework e do ecossistema Laravel.

### Tópicos Abordados

- Desenvolvimento orientado a IA (AI-First Development)
- Integração com modelos de linguagem (LLMs)
- Implementação de RAG para contexto semântico
- Arquitetura de aplicações Laravel com IA
- Deploy e escalabilidade em nuvem

## 🛠️ Stack Tecnológica

- **PHP 8.5.2**
- **Laravel 12** - Framework PHP moderno e elegante
- **Livewire 4** - Componentes dinâmicos sem JavaScript complexo
- **Tailwind CSS 4** - Framework CSS utility-first
- **Alpine.js** - Framework JavaScript leve para interatividade
- **Pest 4** - Framework de testes moderno
- **PostgreSQL** com **pgvector** - Banco de dados com suporte a vetores
- **Laravel Sail** - Ambiente Docker para desenvolvimento

## 📦 Requisitos

- Docker Desktop instalado
- Git
- Conexão com internet para baixar as imagens Docker

## 🚢 Configuração com Laravel Sail

Laravel Sail é um ambiente de desenvolvimento Docker leve que vem com tudo que você precisa para desenvolver aplicações Laravel. Ele já inclui PHP, MySQL/PostgreSQL, Redis, e outras ferramentas.

### Instalando Dependências (Projeto Clonado)

Se você clonou este projeto do Git, primeiro você precisa instalar as dependências do Composer. Como você ainda não tem o Sail configurado, use o Docker para isso:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php85-composer:latest \
    composer install --ignore-platform-reqs
```

Este comando:
- Executa um container temporário com PHP 8.5 e Composer
- Monta o diretório atual no container
- Instala todas as dependências do projeto
- Remove o container após a conclusão

### Configuração Inicial

1. **Copie o arquivo de ambiente:**
```bash
cp .env.example .env
```

2. **Inicie os containers do Sail:**
```bash
./vendor/bin/sail up -d
```

3. **Gere a chave da aplicação:**
```bash
./vendor/bin/sail artisan key:generate
```

4. **Execute as migrações:**
```bash
./vendor/bin/sail artisan migrate
```

5. **Instale as dependências do frontend:**
```bash
./vendor/bin/sail npm install
```

6. **Compile os assets:**
```bash
./vendor/bin/sail npm run dev
```

### Acessando a Aplicação

Após a configuração, você pode acessar:

- **Aplicação:** http://localhost
- **Design System:** http://localhost/design-system

### Comandos Úteis do Sail

```bash
# Iniciar os containers
./vendor/bin/sail up -d

# Parar os containers
./vendor/bin/sail stop

# Executar comandos Artisan
./vendor/bin/sail artisan [comando]

# Executar testes
./vendor/bin/sail artisan test

# Acessar o shell do container
./vendor/bin/sail shell

# Ver logs
./vendor/bin/sail logs

# Executar Tinker
./vendor/bin/sail artisan tinker
```

### Alias (Opcional)

Para facilitar o uso, você pode criar um alias no seu shell:

```bash
# Adicione ao seu ~/.bashrc ou ~/.zshrc
alias sail='./vendor/bin/sail'
```

Depois disso, você pode usar apenas:
```bash
sail up -d
sail artisan migrate
sail npm run dev
```

## 🎨 Design System

O projeto conta com um **Design System completo** e documentado, acessível através da rota `/design-system`. O sistema foi desenvolvido com foco em consistência, acessibilidade e experiência do usuário.

### Componentes Disponíveis

#### 🎨 Fundação
- **Colors**: Paleta de cores completa com suporte a dark mode
- **Typography**: Hierarquia tipográfica com headings, body text, e utilitários

#### 🧩 Componentes Base
- **Buttons**: 5 variantes (primary, secondary, tertiary, danger, link) com estados e tamanhos
- **Inputs**: Campos de texto, textarea, select, checkbox e radio com validação
- **Cards**: Componente versátil para exibição de conteúdo estruturado
- **Alerts**: 5 tipos de alerta (success, error, warning, info, default) com dismiss

#### 📊 Componentes Avançados
- **Tables**: Tabelas com ordenação, paginação e estados (loading, empty)
- **Modals**: Diálogos modais com backdrop e transições suaves
- **Sections**: Containers para organização de conteúdo da aplicação

### Características do Design System

- ✅ **Dark Mode**: Todos os componentes suportam tema escuro
- ✅ **Responsivo**: Design mobile-first com breakpoints consistentes
- ✅ **Acessível**: Componentes seguem as melhores práticas de acessibilidade
- ✅ **Documentado**: Cada componente possui exemplos de uso e código
- ✅ **Reutilizável**: Arquitetura modular com Blade components
- ✅ **Interativo**: Demonstrações funcionais de todos os componentes

### Explorando o Design System

Acesse `http://localhost/design-system` após iniciar a aplicação para:

- Ver todos os componentes em ação
- Copiar código de exemplo
- Entender as props e variantes disponíveis
- Testar o dark mode em tempo real
- Visualizar estados de loading e erro

## 🧪 Testes

O projeto utiliza Pest 4 para testes:

```bash
# Executar todos os testes
./vendor/bin/sail artisan test

# Executar testes de uma categoria específica
./vendor/bin/sail artisan test --testsuite=Feature

# Executar com cobertura
./vendor/bin/sail artisan test --coverage
```

## 📝 Formatação de Código

O projeto utiliza Laravel Pint para formatação:

```bash
# Formatar código modificado
./vendor/bin/sail bin pint --dirty

# Formatar todo o código
./vendor/bin/sail bin pint
```

## 🤝 Contribuindo

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto foi desenvolvido para fins educacionais durante o Laravel Lab 2026.

## 👥 Autores

- **Laravel Lab 2026** - Desenvolvimento durante o evento
- **Beer and Holding** - Organização e coordenação

## 🔗 Links Úteis

- [Documentação do Laravel 12](https://laravel.com/docs/12.x)
- [Documentação do Livewire 4](https://livewire.laravel.com/docs)
- [Documentação do Tailwind CSS](https://tailwindcss.com/docs)
- [Documentação do Laravel Sail](https://laravel.com/docs/12.x/sail)
- [Documentação do Pest](https://pestphp.com/docs)

---

Desenvolvido com ❤️ durante o Laravel Lab 2026
